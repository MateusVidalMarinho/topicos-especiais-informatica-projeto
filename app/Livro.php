<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable=[
        'title',
        'description',
        'slug',
        'pages',
        'picture',
        'author',
        'published_at',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function colecao()
    {
        return $this->belongsToMany('App\Colecao')->withTimestamps();
    }
}
