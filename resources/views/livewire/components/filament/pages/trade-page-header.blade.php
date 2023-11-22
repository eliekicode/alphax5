<x-filament-panels::header class="relative" :actions="$this->getHeaderActions()">
    <x-slot:heading class="">
        <div class="trade__page__heading-icon">
            <img src="{{ asset('images/robot-wob.gif') }}" alt="">
        </div>
        <span class="trade__page__heading-text">AI Trading</span>
    </x-slot:heading>
    <x-slot:subheading>
       <div class="trade__page__subheading">
           Balance :
           {{ \Filament\Facades\Filament::getTenant()->balance->formatted }}
       </div>
    </x-slot:subheading>
</x-filament-panels::header>
