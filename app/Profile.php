<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
    * Fillable fields for a Profile
    *
    * @var array
    */
    protected $fillable = [
        'location', 'bio',
        'twitter_username', 'github_username','profile_image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
