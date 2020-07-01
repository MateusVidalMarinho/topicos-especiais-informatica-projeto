<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colecao extends Model
{

    protected $table = "colecoes";

    protected $fillable=[
        'title',
        'description',
        'slug',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function livro()
    {
        return $this->belongsToMany('App\Livro');
    }
}
