<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'home_flag', 'status', 'created_by', 'updated_by',
    ];

    public function articles()
    {
        return $this->hasMany('App\Article', 'category_id', 'id');
    }
}
