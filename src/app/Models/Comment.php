<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{

    use Notifiable;

    protected $table = 'messages';
    
    protected $fillable =[
        'ticket_id',
        'author_id',
        'author_type',
        'message',
        'created_at'
    ];


    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function author()
    {
        return $this->morphTo();
    }

}

