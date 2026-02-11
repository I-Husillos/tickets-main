<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotifications;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use PhpParser\Node\Expr\Cast\String_;
use App\Services\CommentsService\CommentDataActions;


class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function addComment(StoreCommentRequest $request, String $locale, Ticket $ticket)
    {
        if (!$ticket) {
            return redirect()->back()->with('error', 'El ticket no existe.');
        }
        $this->authorize('comment', $ticket);
        $validated = $request->validated();

        
        $this->commentService->addComment($ticket, $validated['message']);


        if (auth('admin')->check()) {
            return redirect()->route('admin.view.ticket', ['locale' => $locale, 'ticket' => $ticket])->with('success', 'Comentario agregado correctamente.');
        }


        return redirect()->back()->with('success', 'Comentario agregado correctamente.');
    }

    public function viewComments(Ticket $ticket)
    {
        $comments = $ticket->comments()->with('author')->get();
        return view('.comments.index', compact('comments', 'ticket'));
    }



    public function deleteComment(String $locale, Comment $comment)
    {

        if (!auth()->user()->can('delete', $comment)) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar este comentario.');
        }
        

        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }


    public function editComment(String $locale, Ticket $ticket, Comment $comment)
    {
        if (!auth()->user()->can('update', $comment)) {
            return redirect()->back()->with('error', __('messages.comment.not_authorized'));
        }

        return view('comments.edit', compact('ticket', 'comment'));
    }


    public function updateComment(UpdateCommentRequest $request, String $locale, Comment $comment)
    {
        if (!auth()->user()->can('update', $comment)) {
            return redirect()->back()->with('error', __('messages.comment.not_authorized'));
        }

        $comment->message = $request->input('message');
        $comment->save();

        return redirect()->back()->with('success', 'Comentario actualizado correctamente.');
    }


    public function getTicketCommentsAjax(String $locale, Ticket $ticket)
    {
        $comments = $ticket->comments()->with('author')->get();

        $transformer = new CommentDataActions();

        $data = $comments->map(fn($comment) => $transformer->transform($comment));

        return response()->json(['data' => $data]);
    }

}

