<x-filament-panels::header class="trade__page__header">
    <section class="flex">
        <div class="">
            <x-slot:heading class="">
               <section class="trade__page__header-container">
                   <div class="trade__page__header-icon">
                       <img src="{{ asset('images/robot-gif.gif') }}" alt="">
                   </div>
                   <div class="bg-red-500">
                       <span class="trade__page__heading">AI Trading</span>
                       <x-slot:subheading>
                           Balance :
                           {{ \Filament\Facades\Filament::getTenant()->balance->formatted }}
                       </x-slot:subheading>
                   </div>
               </section>
            </x-slot:heading>
        </div>
        <x-filament-actions::actions>
            <x-filament-actions::action>

            </x-filament-actions::action>
        </x-filament-actions::actions>
    </section>
</x-filament-panels::header>
