<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Array types
        $arrayTypes = [
            [
                'name' => 'Internazionale',
                'image' => 'uploads/cucina_internazionale-min.jpg'
            ],

            [
                'name' => 'Italiano',
                'image' => 'uploads/cucina_italiana-min.jpg'
            ],

            [
                'name' => 'Giapponese',
                'image' => 'uploads/cucina_giapponese-min.jpg'
            ],

            [
                'name' => 'Cinese',
                'image' => 'uploads/cucina_cinese-min.jpg'
            ],

            [
                'name' => 'Indiano',
                'image' => 'uploads/cucina_indiana-min.jpg'
            ],

            [
                'name' => 'Messicano',
                'image' => 'uploads/cucina_messicana-min.jpg'
            ],

            [
                'name' => 'Americano',
                'image' => 'uploads/cucina_americana-min.jpg'
            ],

            [
                'name' => 'Pesce',
                'image' => 'uploads/cucina_pesce-min.jpg'
            ],

            [
                'name' => 'Steak House',
                'image' => 'uploads/cucina_steak_house-min.jpg'
            ],

            [
                'name' => 'Greco',
                'image' => 'uploads/cucina_greca-min.jpg'
            ],

            [
                'name' => 'Pizzeria',
                'image' => 'uploads/cucina_pizza-min.jpg'
            ],

            [
                'name' => 'Bar',
                'image' => 'uploads/cucina_bar-min.jpg'
            ],

            [
                'name' => 'Fast-Food',
                'image' => 'uploads/cucina_fast_food-min.jpg'
            ],

            [
                'name' => 'All you can eat',
                'image' => 'uploads/cucina_all_you_can_eat-min.jpg'
            ],

            [
                'name' => 'Spagnolo',
                'image' => 'uploads/cucina_spagnola-min.jpg'
            ],
        ];

        //foreach per simone cosi faccio il commento 

        foreach($arrayTypes as $el){

            $type = new Type();

            $type->type_name = $el['name'];

            $type->type_image = $el['image'];

            $type->save();
        }
    }
}
