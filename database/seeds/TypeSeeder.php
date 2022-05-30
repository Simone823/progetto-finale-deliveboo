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
        $arrayTypes = [
          'Internazionale',
          'Italiano',
          'Giapponese',
          'Cinese',
          'Indiano',
          'Messicano',
          'Americano',
          'Pesce',
          'Steak House',
          'Osteria',
          'Pizzeria',
          'Bar',
          'Fast-Food',
          'All you can eat'
        ];

        //foreach per simone cosi faccio il commento 

        foreach($arrayTypes as $name){

            $type = new Type();

            $type->type_name = $name;

            $type->save();
        }
    }
}
