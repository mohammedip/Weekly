<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;


class Annonce extends Model
{
    protected $table = 'annonces';

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'image',
        'user_id',
        'categorie_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Comment::class);
    }
}
