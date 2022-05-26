<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

        protected $fillable = [
            'name',
            'slug',
            'ingredients',
            'price',
            'image'
        ];

        // public static function get unique slug
        public static function getUniqueSlug($name) {

            // Slug
            $slug = Str::slug($name);
    
            // Slug base
            $slug_base = $slug;
    
            // Counter slug
            $counter = 1;
    
            // Slug present
            $slug_present = User::where('slug', $slug)->first();
    
            while($slug_present) {
                $slug = $slug_base . '-' . $counter;
                $counter++;
                $slug_present = User::where('slug', $slug)->first();
            }
    
            // Return slug
            return $slug;
        }
}

