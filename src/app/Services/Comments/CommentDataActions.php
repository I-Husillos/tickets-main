<?php

namespace App\Services\Comments;

use App\Models\Comment;
use Illuminate\Support\Facades\View;

class CommentDataActions{

    public function transform(Comment $comment, string $locale): array
    {
        $deleteUrl = route('admin.comments.delete', [
            'locale' => $locale,
            'comment' => $comment->id
        ]);


        return [
            'author' => $comment->author->name,
            'message' => $comment->message,
            'date' => $comment->created_at->format('d/m/Y H:i'),
            'actions' => View::make('components.actions.comment-actions', [
                'deleteUrl' => $deleteUrl,
            ])->render(),
        ];
    }
}

