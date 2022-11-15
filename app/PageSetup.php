<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSetup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'meta_title', 'meta_description', 'meta_keywords', 'status',
    ];

    // Page Title
    static public function page($slug)
    {
        $page = PageSetup::where('slug', $slug)
                        ->where('status', 1)
                        ->first();

        return $page;
    }
}
