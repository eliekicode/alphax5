<?php

namespace App\Http\Response;

use Filament\Http\Responses\Auth\Contracts\RegistrationResponse as BaseRegistrationResponse;
use Illuminate\Http\RedirectResponse;

class RegistrationResponse implements BaseRegistrationResponse
{

    public function toResponse($request): void
    {

    }

    public function redirectTo(string $routeName): RedirectResponse
    {
        return redirect()->route($routeName);
    }
}
