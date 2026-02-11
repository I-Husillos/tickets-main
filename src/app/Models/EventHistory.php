<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventHistory extends Model
{

    protected $fillable = [
        'event_type',
        'description',
        'user',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
