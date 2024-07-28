<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;
    public $heartsCount;

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->heartsCount = $note->hearts_count;
    }

    public function addHeart() {
        $this->note->update([
            'hearts_count' => ++$this->heartsCount
    ]);
    }
}; ?>

<div>
    <x-button xs wire:click='addHeart' rose icon='heart' spinner>{{ $heartsCount }}</x-button>
</div>
