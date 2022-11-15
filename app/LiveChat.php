<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveChat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'whatsapp_no', 'whatsapp_title', 'whatsapp_greeting', 'whatsapp_color', 'whatsapp_position', 'whatsapp_status', 'facebook_id', 'facebook_greeting_in', 'facebook_greeting_out', 'facebook_color', 'facebook_position', 'facebook_status', 'status',
    ];
}
