<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'slug', 'description', 'home_flag', 'status', 'created_by', 'updated_by',
    ];

    public function category()
    {
    	return $this->belongsTo('App\FaqCategory', 'category_id');
    }
}
