<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;

class NotePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    public function delete(User $user,Note $note):bool {
        return $user->id === $note->user_id;
    }
    public function update(User $user,Note $note):bool {
        return $user->id === $note->user_id;
    }
}
