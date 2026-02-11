<?php
namespace App\Services;

use App\Models\Comment;
use App\Models\Ticket;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendNotifications;
use Dotenv\Util\Str;
use PhpParser\Node\Expr\Cast\String_;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

class CommentService
{
    public function addComment(Ticket $ticket, string $message)
    {
        $author = auth()->user() ?? auth('admin')->user();
        
        
        $comment = $ticket->comments()->create([
            'ticket_id' => $ticket->id,
            'author_id' => Auth::id(),
            'author_type' => Auth::user() instanceof Admin ? Admin::class : User::class,
            'message' => $message,
        ]);


        EventHistory::create([
            'event_type' => 'Comentario',
            'description' => 'Nuevo comentario en ticket ID ' . $ticket->id . ' por ' . $author->email . ' (' . $author->name . ')',
            'user' => $author->name,
        ]);

        if ($author instanceof Admin && $ticket->user) {
            SendNotifications::dispatch($ticket->id, 'commented', $comment);
        } elseif ($author instanceof User && $ticket->admin) {
            SendNotifications::dispatch($ticket->id, 'user_commented', $comment);
        } elseif ($author instanceof User) {
            SendNotifications::dispatch($ticket->id, 'user_commented', $comment);
        }
    }
}

