<?php

namespace App\Filament\Pages\Auth;

use App\Enums\Department\Department;
use App\Enums\User\RoleName;
use App\Models\Lead;
use App\Models\LeadProvider;
use App\Models\User;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Register extends BaseRegister
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.auth.register';

    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
            ->helperText('Phone format : 33xxxxxxxxx')
            ->required()
            ->maxLength(255);
    }

    protected function getCountryFormComponent(): Component
    {
        return TextInput::make('country')
            ->required()
            ->maxLength(255);
    }

    /**
     * @return array<int | string, string | Form>
     */
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPhoneFormComponent(),
                        $this->getCountryFormComponent()
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    public function register(): ?RegistrationResponse
    {
        try {
            $this->rateLimit(4);
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/register.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/register.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/register.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        $saleHeadOfDepartment = User::query()
            ->whereHas('roles', fn(Builder $query) => $query->where('name', RoleName::HEAD_OF_DEPARTMENT->value))
            ->whereHas('department', fn(Builder $query) => $query->where('name', Department::SALE->value))
            ->first();

        $provider = LeadProvider::where('name', 'alphax5')
            ->first();

        $lead = Lead::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'lead_provider_id' => $provider?->id,
            'owner_id' => $saleHeadOfDepartment?->id,
            'department_id' => $saleHeadOfDepartment?->department?->id,
            'last_sale_status' => 'new',
            'affiliate' => 'alphax5',
            'broker' => 'alphax5'
        ]);


        $this->notify($saleHeadOfDepartment, $this->getCrmUrlByEnvironment(config('app.env')), $provider, 1);


        redirect('user/register')->with('status', 'Your information has been successfully saved! Later, our services will call you back so that we can assist you with activating your account, while giving you more information about our platform.');

        return null;
    }

    private function getCrmUrlByEnvironment(string $environment)
    {
        if ($environment === 'local') {
            return 'http://trading-plateform.test/department/leads';
        } elseif ($environment === 'production') {
            return 'https://crm.alphax5.com/department/leads';
        }
    }

    private function notify(User|array|Collection $recipients, string $url, LeadProvider $provider, int $leadsCount): void
    {
        $queryString = "?tableFilters[last_sale_status][value]=new&tableFilters[lead_provider_id][values][0]=$provider->id&tableSortColumn=created_at&tableSortDirection=desc";

//        if ($recipients instanceof User) {
//            $queryString .= "&tableFilters[owner_id][value]=$recipients->id";
//        }

        Notification::make()
            ->info()
            ->title("New leads loaded")
            ->body($leadsCount . " " . Str::plural('leads', $leadsCount) . " has been loaded from $provider->name")
            ->actions([
                Action::make('View')
                    ->url(fn() => $url . $queryString)
            ])
            ->sendToDatabase($recipients)
            ->broadcast($recipients);
    }
}
