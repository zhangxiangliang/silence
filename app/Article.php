<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at'
    ];

    protected $dates = ['published_at'];

    // 对创建、修改的数据格式化
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    // 数据关系，一篇文章有多个评论
    public function comment(){
        return $this->hasMany('App/Comment');
    }

    // 过滤为发表文章
    public function scopePublish($query){
        $query->where('published_at', '<=', Carbon::now());
    }
}
