<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Authenticatable;

class CommentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comment $comment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function comment($user, Ticket $ticket): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        if ($user instanceof User) {
            return $user->id === $ticket->user_id || $user->id === $ticket->admin_id;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment): bool
    {
        return $comment->author_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Comment $comment): bool
    {
        if ($user instanceof \App\Models\Admin) {
            return $comment->author_id === $user->id || $user->superadmin;
        }

        if ($user instanceof \App\Models\User) {
            return $comment->author_id === $user->id;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comment $comment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comment $comment): bool
    {
        return false;
    }
}
