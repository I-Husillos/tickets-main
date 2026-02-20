<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;

class Ticket extends Model
{
    protected $table = 'tickets';

    // Eliminar notificaciones relacionadas al eliminar un ticket, se hace en el modelo para asegurar que se ejecute siempre, incluso si se eliminan tickets desde Tinker o directamente en la base de datos
    protected static function booted(): void
    {
        static::deleting(function (Ticket $ticket) {
            DatabaseNotification::whereJsonContains('data->ticket_id', $ticket->id)->delete();
        });
    }

    protected $fillable = [
        'title',
        'description',
        'type',
        'priority',
        'status',
        'user_id',
        'admin_id',
        'project_id',
        'created_by_admin_id',
        'is_admin_ticket',
        'resolved_at'
    ];

    protected $primaryKey = 'id';



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ticket_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_ticket');
    }

    public function createdByAdmin()
    {
        return $this->belongsTo(Admin::class, 'created_by_admin_id');
    }

}

