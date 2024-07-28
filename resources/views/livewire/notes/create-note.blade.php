<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title;
    public $body;
    public $recipient;
    public $sentAt;

    protected $rules = [
        'title' => 'required|min:6|string',
        'body' => 'required|string|min:20|max:255',
        'recipient' => 'required|email',
        'sentAt' => 'required|date',
    ];

    public function submit() {
        $this->validate();
        auth()->user()->notes()->create([
            'title' => $this->title,
            'body' => $this->body,
            'recipient' => $this->recipient,
            'sent_at' => $this->sentAt,
    ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-3">
        @csrf
        <x-input wire:model='title' label='Title' />
        <x-textarea wire:model='body' label='Body'/>
        <x-input icon='user' wire:model='recipient' label='Recipient' placeholder='test@exemple.com' type='email'/>
        <x-input icon='calendar' wire:model='sentAt' type='date' label='Send Date'  />
        <div class="text-center">
            <x-button wire:click='submit' spinner>Save</x-button>
        </div>

    </form>
</div>
