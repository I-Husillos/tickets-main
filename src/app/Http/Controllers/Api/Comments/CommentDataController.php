<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Services\Comments\CommentDataActions;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ticket;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class CommentDataController extends Controller
{
    protected $actions;

    public function __construct(CommentDataActions $actions)
    {
        $this->actions = $actions;
    }

    public function viewComments(Request $request, Ticket $ticket)
    {
        $locale = $request->header('X-Locale') ?? $request->input('locale') ?? 'en';
        App::setLocale($locale);

        // Obtenemos todos los comentarios para poder ordenar (incluyendo polimórfico 'author') en memoria.
        // Asumimos que la cantidad de comentarios por ticket no es excesiva.
        $comments = $ticket->comments()->with('author')->get();

        $total = $comments->count();

        // 1. Filtrado (Search) - Opcional, si quisieras implementarlo:
        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $comments = $comments->filter(function ($comment) use ($searchValue) {
                // Ajusta los campos donde quieras buscar
                return stripos($comment->message, $searchValue) !== false 
                    || ($comment->author && stripos($comment->author->name, $searchValue) !== false);
            });
        }
        
        $filteredTotal = $comments->count();

        // 2. Ordenación
        $order = $request->input('order');
        $columns = $request->input('columns');

        if ($order && isset($order[0])) {
            $columnIndex = $order[0]['column'];
            $columnDir = $order[0]['dir']; // 'asc' or 'desc'
            $columnName = $columns[$columnIndex]['data']; // 'author', 'message', 'date'

            $isDesc = ($columnDir === 'desc');

            if ($columnName === 'author') {
                $comments = $comments->sortBy(function ($comment) {
                    return $comment->author ? strtolower($comment->author->name) : '';
                }, SORT_NATURAL|SORT_FLAG_CASE, $isDesc);
            } elseif ($columnName === 'message') {
                $comments = $comments->sortBy(function ($comment) {
                    return strtolower($comment->message);
                }, SORT_NATURAL|SORT_FLAG_CASE, $isDesc);
            } elseif ($columnName === 'date') {
                $comments = $comments->sortBy('created_at', SORT_REGULAR, $isDesc);
            }
        } else {
            // Orden por defecto: Fecha descendente (más recientes primero)
            $comments = $comments->sortByDesc('created_at');
        }

        // 3. Paginación
        $start = (int) $request->input('start', 0);
        $length = (int) $request->input('length', 10);
        $draw = (int) $request->input('draw', 1);

        // slice devuelve una nueva colección, values() reindexa el array
        $pagedComments = $comments->slice($start, $length)->values();

        $data = $pagedComments->map(function ($comment) use ($locale) {
            $view = View::make('components.actions.comment-actions', compact('comment'))->render();

            return [
                'author' => $comment->author ? $comment->author->name : 'Unknown',
                'message' => $comment->message,
                'date' => $comment->created_at->format('d/m/Y H:i'),
                'actions' => $view,
            ];
        });

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $filteredTotal,
            'data' => $data,
        ]);
    }


    public function deleteComment(Comment $comment)
    {
        if (!auth()->user()->can('delete', $comment)) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $comment->delete();

        return response()->json(['success' => true, 'message' => 'Comentario eliminado correctamente']);
    }

}


