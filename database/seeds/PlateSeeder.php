<?php

use Illuminate\Database\Seeder;
use App\Plate;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creo un array di piatti
        $arrayPlates = [
            [
                'name' => 'Pizza margherita',
                'ingredients_description' => ['salsa', 'mozzarella', 'basilico fresco'],
                'price' => '4.50',
                'image' => '',
            ],
            [
                'name' => 'Bucatini all\'amatriciana',
                'ingredients_description' => ['salsa', 'guanciale', 'cipolla', 'parmigiano reggiano'],
                'price' => '8.00',
                'image' => '',
            ],
            [
                'name' => 'Gamberi in tempura',
                'ingredients_description' => ['gamberi', 'acqua gassata', 'farina di riso', 'farina 00', 'ghiaccio'],
                'price' => '5.50',
                'image' => '',
            ],
            [
                'name' => 'Pasta all\'Eoliana',
                'ingredients_description' => ['pomodori', 'datterini', 'capperi', 'stracciatella'],
                'price' => '9.50',
                'image' => '',
            ],
            [
                'name' => 'Guacamole',
                'ingredients_description' => ['avocado', 'olio', 'sale', 'pepe', 'pomodorino', 'cipolla'],
                'price' => '3.00',
                'image' => '',
            ],
            [
                'name' => 'Arancino',
                'ingredients_description' => ['riso', 'ragù', 'pangrattato', 'olio'],
                'price' => '1.50',
                'image' => '',
            ],
            [
                'name' => 'Orecchiette alle cime di rapa',
                'ingredients_description' => ['orecchiette', 'olio', 'rapa', 'aglio'],
                'price' => '8.00',
                'image' => '',
            ],
            [
                'name' => 'Puccia Salentina',
                'ingredients_description' => ['puccia', 'pomodori secchi', 'zucchine grigliate', 'formaggio'],
                'price' => '4.50',
                'image' => '',
            ],
            [
                'name' => 'Crepes alla Nutella',
                'ingredients_description' => ['latte', 'farina 00', 'uova', 'burro', 'nutella', 'zucchero a velo'],
                'price' => '3.50',
                'image' => '',
            ],
            [
                'name' => 'Mozzarella in carrozza',
                'ingredients_description' => ['pane bianco', 'mozzarella di bufala', 'sale', 'uova', 'farina 00', 'pangrattato'],
                'price' => '2.00',
                'image' => '',
            ],
            [
                'name' => 'Impepata di cozze',
                'ingredients_description' => ['cozze', 'pepe nero', 'prezzemolo', 'limoni'],
                'price' => '5.00',
                'image' => '',
            ],
            [
                'name' => 'Panelle',
                'ingredients_description' => ['farina di ceci', 'acqua', 'sale', 'prezzemolo', 'olio di semi'],
                'price' => '1.50',
                'image' => '',
            ],
            [
                'name' => 'Ravioli cinesi al vapore',
                'ingredients_description' => ['farina 00', 'acqua', 'sale fino', 'ripieno di maiale'],
                'price' => '3.50',
                'image' => '',
            ],
            [
                'name' => 'Involtini primavera',
                'ingredients_description' => ['pasta fillo', 'carote', 'cavolo', 'germogli di soia', 'olio', 'salsa di soia'],
                'price' => '2.00',
                'image' => '',
            ],
        ];

        //ciclo l'array dei piatti e li salvo
        foreach($arrayPlates as $plate){

            $slug = Plate::getUniqueSlug($plate['name']);

            $new_plate = new Plate();

            $new_plate->name = $plate['name'];
            $new_plate->ingredients = $plate['ingredients'];
            $new_plate->price = $plate['price'];
            $new_plate-> image = $plate['image'];
            $new_plate->slug = $slug;

            $new_plate->save();
        };

    }
}
