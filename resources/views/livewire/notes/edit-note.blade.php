<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public $title;
    public $body;
    public $recipient;
    public $sent_at;
    public $is_published;

    protected $rules = [
        'title' => 'required|min:6|string',
        'body' => 'required|string|min:20|max:255',
        'recipient' => 'required|email',
        'sent_at' => 'required|date',
    ];

    public function submit()
    {
        $this->validate();
        $this->note->update([
            'title' => $this->title,
            'body' => $this->body,
            'recipient' => $this->recipient,
            'sent_at' => $this->sent_at,
            'is_published' => $this->is_published,
        ]);
        $this->dispatch('note-saved');
    }

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
        $this->is_published = $note->is_published;
        $this->sent_at = $note->sent_at;
    }
}; ?>

<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') . ' : ' . $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form wire:submit='submit' class="space-y-3">
                        @csrf
                        <x-input wire:model='title' label='Title' />
                        <x-textarea wire:model='body' label='Body' />
                        <x-input icon='user' wire:model='recipient' label='Recipient' placeholder='test@exemple.com'
                            type='email' />
                        <x-input icon='calendar' wire:model='sent_at' type='date' label='Send Date' />
                        <x-checkbox wire:model='is_published' label="Not is Pulished?" />
                        <div class="flex justify-between">
                            <x-button secondary type='submit' wire:click='submit' spinner>Save</x-button>
                            <x-button  href="{{ route('notes.index') }}" flat negative>Back To Notes
                            </x-button>
                        </div>
                        <x-action-message on="note-saved">Note Saved</x-action-message>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
