<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status', 'created_by', 'updated_by',
    ];

    public function faqs()
    {
    	return $this->hasMany('App\Faq', 'cateogry_id', 'id');
    }
}
