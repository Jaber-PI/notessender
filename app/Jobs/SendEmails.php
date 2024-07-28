<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmails
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private Note $note)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $noteUrl = config('app.url') . '/notes/' . $this->note->id;

        $emailContent = "You have recieved a new Note from " . $this->note->user->name .". View it Here " . $noteUrl;
        Mail::raw($emailContent, function($message) {
            $message->from('jaber@note.nt','NotesSender')
            ->to($this->note->recipient)
            ->subject("New Note from {$this->note->user->name}");
        });
    }
}
