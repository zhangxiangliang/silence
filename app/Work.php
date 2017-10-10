<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'title',
        'price',
        'place',
        'time',
        'published_at',
        'description',
        'company',
        'status',
    ];
    public function user(){
        return $this->belongsToMany('App\User');
    }
}
