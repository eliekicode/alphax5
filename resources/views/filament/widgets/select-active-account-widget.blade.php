<x-filament-widgets::widget>
    {{ $this->getCurrentAccount() }}
    <form wire:submit="create">
        {{ $this->form }}
    </form>
</x-filament-widgets::widget>
