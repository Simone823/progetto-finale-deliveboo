<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plate extends Model
{

        protected $fillable = [
            'name',
            'slug',
            'ingredients',
            'price',
            'image'
        ];

        public function user(){
            return $this->belongsTo('App\User');
        }

        // public static function get unique slug
        public static function getUniqueSlug($name) {

            // Slug
            $slug = Str::slug($name);
    
            // Slug base
            $slug_base = $slug;
    
            // Counter slug
            $counter = 1;
    
            // Slug present
            $slug_present = Plate::where('slug', $slug)->first();
    
            while($slug_present) {
                $slug = $slug_base . '-' . $counter;
                $counter++;
                $slug_present = Plate::where('slug', $slug)->first();
            }
    
            // Return slug
            return $slug;
        }
}

