<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User|Admin $user): bool
    {
        return true;
    }

    public function index(User|Admin $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User|Admin $user, Ticket $ticket)
    {
        if ($user instanceof Admin) {
            return $user->superadmin || $ticket->admin_id === $user->id || $ticket->admin_id === null;
        }
        return $user->id === $ticket->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User|Admin $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User|Admin $user, Ticket $ticket)
    {
        if ($user instanceof Admin) {
            return $user->superadmin
                || $ticket->admin_id === $user->id
                || $ticket->created_by_admin_id === $user->id
                || $ticket->admin_id === null;
        }
        // Users can update their own tickets
        return $user->id === $ticket->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User|Admin $user, Ticket $ticket)
    {
        if ($user instanceof Admin) {
            return $user->superadmin || $ticket->admin_id === $user->id;
        }
        return $user->id === $ticket->user_id;
    }

    //modificar para que este en la policy de comment
    public function comment(User|Admin $user, Ticket $ticket)
    {
        if ($user instanceof Admin) {
            return true;
        }

        if ($user instanceof User) {
            return $user->id === $ticket->user_id;
        }

        return false;
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User|Admin $user, Ticket $ticket): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User|Admin $user, Ticket $ticket): bool
    {
        return false;
    }
}
