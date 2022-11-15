<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facebook', 'twitter', 'linkedin', 'instagram', 'pinterest', 'youtube', 'skype', 'whatsapp', 'status',
    ];
}
