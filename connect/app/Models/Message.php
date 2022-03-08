<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message'];

    public function scopeGetData($query)
    {
        return $this->created_at . '　' . $this->user_id . '　' . $this->message;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
