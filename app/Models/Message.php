<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    protected $guarded = []; 
    
    public function sender()
    {
        return $this->belongsTo( User::class, 'sender_id', 'id');
    }

    public function reciever()
    {
        return $this->belongsTo(User::class, 'reciever_id', 'id');
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
