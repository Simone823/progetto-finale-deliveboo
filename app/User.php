<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname', 
        'email', 
        'password',
        'p_iva',
        'business_name',
        'business_slug',
        'business_city',
        'business_cap',
        'business_address',
        'business_image'
    ];

    public function plates(){
        return $this->hasMany('App\Plate');
    }

    // public static function get unique slug
    public static function getUniqueSlug($business_name) {

        // Slug
        $slug = Str::slug($business_name);

        // Slug base
        $slug_base = $slug;

        // Counter slug
        $counter = 1;

        // Slug present
        $slug_present = User::where('business_slug', $slug)->first();

        while($slug_present) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $slug_present = User::where('business_slug', $slug)->first();
        }

        // Return slug
        return $slug;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
