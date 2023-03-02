<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',
        'user_id',
        'objet',
        'contenu',
    ];
}
