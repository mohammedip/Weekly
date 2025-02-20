<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Annonce;
use App\Models\User;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'contenu',
        'user_id',
        'annonce_id',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
