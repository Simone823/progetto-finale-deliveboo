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
                'image' => 'uploads/cucina_internazionale.png'
            ],

            [
                'name' => 'Italiano',
                'image' => 'uploads/cucina_italiana.png'
            ],

            [
                'name' => 'Giapponese',
                'image' => 'uploads/cucina_giapponese.png'
            ],

            [
                'name' => 'Cinese',
                'image' => 'uploads/cucina_cinese.png'
            ],

            [
                'name' => 'Indiano',
                'image' => 'uploads/cucina_indiana.png'
            ],

            [
                'name' => 'Messicano',
                'image' => 'uploads/cucina_messicana.png'
            ],

            [
                'name' => 'Americano',
                'image' => 'uploads/cucina_americana.png'
            ],

            [
                'name' => 'Pesce',
                'image' => 'uploads/cucina_pesce.png'
            ],

            [
                'name' => 'Steak House',
                'image' => 'uploads/cucina_steak_house.png'
            ],

            [
                'name' => 'Greco',
                'image' => 'uploads/cucina_greca.png'
            ],

            [
                'name' => 'Pizzeria',
                'image' => 'uploads/cucina_pizza.png'
            ],

            [
                'name' => 'Bar',
                'image' => 'uploads/cucina_bar.png'
            ],

            [
                'name' => 'Fast-Food',
                'image' => 'uploads/cucina_fast_food.png'
            ],

            [
                'name' => 'All you can eat',
                'image' => 'uploads/cucina_all_you_can_eat.png'
            ],

            [
                'name' => 'Spagnolo',
                'image' => 'uploads/cucina_spagnola.png'
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
