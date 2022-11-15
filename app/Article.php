<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'slug', 'description', 'file_path', 'video_id', 'status', 'created_by', 'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo('App\ArticleCategory', 'category_id');
    }
}
