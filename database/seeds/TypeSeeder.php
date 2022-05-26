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

          'Colazione',
          'Italiano',
          'Giapponese',
          'Cinese',
          'Indiano',
          'Libanese',
          'Americano',
          'Pescheria',
          'Steak House',
          'Osteria',
          'Trattoria',
          'Pizzeria',
          'Bar',
          'Fast-Food',
          'All you can eat'
        
        ];

        //foreach per simone cosi faccio il commento 

        foreach($arrayTypes as $name){

            $type = new Type();

            $type->name = $name;

            $type->save();
        }
    }
}
