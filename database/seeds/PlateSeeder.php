<?php

use Illuminate\Database\Seeder;
use App\Plate;
use App\User;

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
                'name' => 'Pizza Margherita',
                'ingredients' => ['salsa', 'mozzarella', 'basilico fresco'],
                'price' => '4.50',
                'image' => 'uploads/pizza_margherita.png',
            ],

            [
                'name' => 'Pizza Asparagi',
                'ingredients' => ['pomodoro', 'mozzarella', 'asparagi'],
                'price' => '6.50',
                'image' => 'uploads/pizza_asparagi.png',
            ],

            [
                'name' => 'Pizza Bolognese',
                'ingredients' => ['pomodoro', 'mozzarella', 'mortadella', 'aceto balsamico', 'rucola'],
                'price' => '7.50',
                'image' => 'uploads/pizza_bolognese.png',
            ],

            [
                'name' => 'Pizza Bresaola',
                'ingredients' => ['pomodoro', 'mozzarella', 'bresaola'],
                'price' => '7.50',
                'image' => 'uploads/pizza_bresaola.png',
            ],

            [
                'name' => 'Pizza Bresaola e Rucola',
                'ingredients' => ['pomodoro', 'mozzarella', 'bresaola', 'rucola'],
                'price' => '7.30',
                'image' => 'uploads/pizza_breasola_rucola.png',
            ],

            [
                'name' => 'Pizza Bresaola e Grana',
                'ingredients' => ['pomodoro', 'mozzarella', 'bresaola', 'rucola', 'grana e scaglie'],
                'price' => '8.00',
                'image' => 'uploads/pizza_breasola_rucola_grana.png',
            ],

            [
                'name' => 'Pizza Bucaniera',
                'ingredients' => ['pomodoro', 'basilico', 'aglio', 'peperoncino'],
                'price' => '4.00',
                'image' => 'uploads/pizza_bucaniera.png',
            ],

            [
                'name' => 'Calzone Classico',
                'ingredients' => ['pomodoro', 'mozzarella', 'prosciutto e funghi'],
                'price' => '7.50',
                'image' => 'uploads/calzone_classico.png',
            ],

            [
                'name' => 'Pizza Diavola',
                'ingredients' => ['pomodoro', 'mozzarella', 'salamino piccante'],
                'price' => '6.50',
                'image' => 'uploads/pizza_diavola.png',
            ],

            [
                'name' => 'Pizza Chips',
                'ingredients' => ['pomodoro', 'mozzarella', 'patate fritte'],
                'price' => '6.50',
                'image' => 'uploads/pizza_chips.png',
            ],

            [
                'name' => 'Pizza 4 Formaggi',
                'ingredients' => ['pomodoro', 'mozzarella', 'brie', 'gorgonzola', 'emmenthal'],
                'price' => '6.50',
                'image' => 'uploads/pizza_4_formaggi.png',
            ],

            [
                'name' => 'Pizza Friulana',
                'ingredients' => ['pomodoro', 'mozzarella', 'salame dolce'],
                'price' => '6.50',
                'image' => 'uploads/pizza_friulana.png',
            ],

            [
                'name' => 'Pizza ai Funghi',
                'ingredients' => ['pomodoro', 'mozzarella', 'funghi'],
                'price' => '6.50',
                'image' => 'uploads/pizza_funghi.png',
            ],

            [
                'name' => 'Focaccia',
                'ingredients' => ['aglio', 'cipolla', 'rosmarino'],
                'price' => '4.50',
                'image' => 'uploads/focaccia.png',
            ],

            [
                'name' => 'Pizza ai Peperoni',
                'ingredients' => ['pomodoro', 'mozzarella', 'peperoni'],
                'price' => '6.50',
                'image' => 'uploads/pizza_peperoni.png',
            ],
            [
                'name' => 'Ebi gyoza',
                'ingredients' => ['Ravioli di gamberi al vapore'],
                'price' => '4.50',
                'image' => 'uploads/ebi_gyoza.png',
            ],

            [
                'name' => 'Edamame',
                'ingredients' => ['Fagioli di soia bolliti'],
                'price' => '3.00',
                'image' => 'uploads/emadame.png',
            ],

            [
                'name' => 'Alghe wakame',
                'ingredients' => ['Insalata di alghe wakame'],
                'price' => '3.00',
                'image' => 'uploads/alghe_wakame.png',
            ],

            [
                'name' => 'Zuppa di miso',
                'ingredients' => ['Zuppa di soia con alghe e tofu'],
                'price' => '3.00',
                'image' => 'uploads/zuppa_di_miso.png',
            ],

            [
                'name' => 'Yasai yaki meshi',
                'ingredients' => ['Riso saltato con verdure e uova'],
                'price' => '6.00',
                'image' => 'uploads/yasai_yaki_meshi.png',
            ],

            [
                'name' => 'Ebi yaki meshi',
                'ingredients' => ['Riso saltato con gamberi, verdure e uova'],
                'price' => '7.00',
                'image' => 'uploads/ebi_yaki_meshi.png',
            ],

            [
                'name' => 'Tori yaki meshi',
                'ingredients' => ['Riso saltato con pollo, verdure e uova'],
                'price' => '7.00',
                'image' => 'uploads/tori_yaki_meshi.png',
            ],

            [
                'name' => 'Yasai yaki udon',
                'ingredients' => ['Spaghetti saltati con verdure e uova'],
                'price' => '6.00',
                'image' => 'uploads/yasai_yaki_udon.png',
            ],

            [
                'name' => 'Ebi yaki udon',
                'ingredients' => ['Spaghetti saltati con gamberi, verdure e uova'],
                'price' => '7.00',
                'image' => 'uploads/ebi_yaki_udon.png',
            ],

            [
                'name' => 'Nigiri sake',
                'ingredients' => ['Salmone'],
                'price' => '3.00',
                'image' => 'uploads/nigiri_sake.png',
            ],

            [
                'name' => 'Nigiri Maguro',
                'ingredients' => ['Tonno'],
                'price' => '3.00',
                'image' => 'uploads/nigiri_maguro.png',
            ],

            [
                'name' => 'Nigiri Kani',
                'ingredients' => ['Granchio'],
                'price' => '3.00',
                'image' => 'uploads/nigiri_kani.png',
            ],

            [
                'name' => 'Nigiri Ebi tempura',
                'ingredients' => ['Gamberetto fritto'],
                'price' => '3.00',
                'image' => 'uploads/nigiri_ebi_tempura.png',
            ],

            [
                'name' => 'Hosomaki Sake',
                'ingredients' => ['salmone', 'sesamo'],
                'price' => '3.50',
                'image' => 'uploads/hosomaki_sake.png',
            ],

            [
                'name' => 'Hosomaki Maguro',
                'ingredients' => ['tonno', 'tabasco', 'sesamo'],
                'price' => '3.50',
                'image' => 'uploads/hosomaki_maguro.png',
            ],
            [
                'name' => 'Menù Ghandi',
                'ingredients' => ['menù vegetariano: samosa e pakora mix, aloo raita, cheese naan, paneer makhani, aloo palak, riso, dessert a scelta, bevande escluse'],
                'price' => '18.00',
                'image' => 'uploads/menu_ghandi.png',
            ],

            [
                'name' => 'Menù Maharaja',
                'ingredients' => ['misto carne, verdure, maharaja mix, aloo rita, cheese naan, tandoori chicken, lamb byriani, mix vegetable, dessert a scelta, bevande escluse'],
                'price' => '28.00',
                'image' => 'uploads/menu_maharaja.png',
            ],

            [
                'name' => 'Menù Kerala',
                'ingredients' => ['gamberi e gamberoni, jinga tandoori, aloo raita, cheese naan, jhinga madrasi, aloo palak, riso, dessert a scelta, bevande escluse'],
                'price' => '26.00',
                'image' => 'uploads/menu_kerala.png',
            ],

            [
                'name' => 'Menù Kolkota',
                'ingredients' => ['pesce spada, fish amristari, aloo rita, cheese naan, fish masala, dal bukara, riso, dessert a scelta, bevande escluse'],
                'price' => '26.00',
                'image' => 'uploads/menu_kolkota.png',
            ],

            [
                'name' => 'Menù Pausa pranzo',
                'ingredients' => ['cucina italiana e indiana: primo piatto, secondo piatto, acqua e caffé'],
                'price' => '10.00',
                'image' => 'uploads/menu_pausa_pranzo.png',
            ],
            [
                'name' => 'Tortillas',
                'ingredients' => ['Per I messicani rappresenta il pane e il piatto con cui accompagnare le pietanze'],
                'price' => '12.00',
                'image' => 'uploads/tortillas.png',
            ],

            [
                'name' => 'Totopos',
                'ingredients' => ['Pezzettini triangolari di tortillas di mais fritti e croccanti'],
                'price' => '6.00',
                'image' => 'uploads/totopos.png',
            ],

            [
                'name' => 'Tacos shell',
                'ingredients' => ['tortillas di farina gialla fritte, farcite, accompagnate da fagioli e insalata mista'],
                'price' => '9.00',
                'image' => 'uploads/tacos_shell.png',
            ],

            [
                'name' => 'Tortillas al pastor',
                'ingredients' => ['tortillas di farina gialla fritte, farcite con carne di maiale'],
                'price' => '9.00',
                'image' => 'uploads/tortillas_al_pastor.png',
            ],

            [
                'name' => 'MIX de Tacos',
                'ingredients' => ['tortillas di farina bianca pollo/manzo, fagioli, insalata mista'],
                'price' => '9.00',
                'image' => 'uploads/mix_de_tacos.png',
            ],

            [
                'name' => 'Tinga',
                'ingredients' => ['Pollo sfilacciato con salsiccia mex cipolla e fagioli'],
                'price' => '9.00',
                'image' => 'uploads/tinga.png',
            ],

            [
                'name' => 'Fajitas de pollo',
                'ingredients' => ['pollo con peperoni ecipolla accompagnato con fagioli e guacamole'],
                'price' => '9.00',
                'image' => 'uploads/fajitas_de_pollo.png',
            ],
            [
                'name' => 'Bucatini all\'amatriciana',
                'ingredients' => ['salsa', 'guanciale', 'cipolla', 'parmigiano reggiano'],
                'price' => '8.00',
                'image' => 'uploads/bucatini_amatriciana.png',
            ],
            [
                'name' => 'Gamberi in tempura',
                'ingredients' => ['gamberi', 'acqua gassata', 'farina di riso', 'farina 00', 'ghiaccio'],
                'price' => '5.50',
                'image' => 'uploads/gamberi_in_tempura.png',
            ],
            [
                'name' => 'Pasta all\'Eoliana',
                'ingredients' => ['pomodori', 'datterini', 'capperi', 'stracciatella'],
                'price' => '9.50',
                'image' => 'uploads/pasta_all_eoliona.png',
            ],
            [
                'name' => 'Guacamole',
                'ingredients' => ['avocado', 'olio', 'sale', 'pepe', 'pomodorino', 'cipolla'],
                'price' => '3.00',
                'image' => 'uploads/guacamole.png',
            ],
            [
                'name' => 'Arancino',
                'ingredients' => ['riso', 'ragù', 'pangrattato', 'olio'],
                'price' => '1.50',
                'image' => 'uploads/arancino.png',
            ],
            [
                'name' => 'Orecchiette alle cime di rapa',
                'ingredients' => ['orecchiette', 'olio', 'rapa', 'aglio'],
                'price' => '8.00',
                'image' => 'uploads/orechiette_cime_di_rapa.png',
            ],
            [
                'name' => 'Puccia Salentina',
                'ingredients' => ['puccia', 'pomodori secchi', 'zucchine grigliate', 'formaggio'],
                'price' => '4.50',
                'image' => 'uploads/puccia_salentina.png',
            ],
            [
                'name' => 'Crepes alla Nutella',
                'ingredients' => ['latte', 'farina 00', 'uova', 'burro', 'nutella', 'zucchero a velo'],
                'price' => '3.50',
                'image' => 'uploads/crepes_nutella.png',
            ],
            [
                'name' => 'Mozzarella in carrozza',
                'ingredients' => ['pane bianco', 'mozzarella di bufala', 'sale', 'uova', 'farina 00', 'pangrattato'],
                'price' => '2.00',
                'image' => 'uploads/mozzarella_in_carrozza.png',
            ],
            [
                'name' => 'Impepata di cozze',
                'ingredients' => ['cozze', 'pepe nero', 'prezzemolo', 'limoni'],
                'price' => '5.00',
                'image' => 'uploads/impepata_di_cozze.png',
            ],
            [
                'name' => 'Panelle',
                'ingredients' => ['farina di ceci', 'acqua', 'sale', 'prezzemolo', 'olio di semi'],
                'price' => '1.50',
                'image' => 'uploads/panelle.png',
            ],
            [
                'name' => 'Ravioli cinesi al vapore',
                'ingredients' => ['farina 00', 'acqua', 'sale fino', 'ripieno di maiale'],
                'price' => '3.50',
                'image' => 'uploads/ravioli_cinesi_vapore.png',
            ],
            [
                'name' => 'Involtini primavera',
                'ingredients' => ['pasta fillo', 'carote', 'cavolo', 'germogli di soia', 'olio', 'salsa di soia'],
                'price' => '2.00',
                'image' => 'uploads/involtini_primavera.png',
            ],
        ];

        //ciclo l'array dei piatti e li salvo
        foreach($arrayPlates as $plate){

            $slug = Plate::getUniqueSlug($plate['name']);

            $new_plate = new Plate();

            $new_plate->name = $plate['name'];
            $new_plate->slug = $slug;
            $new_plate->ingredients = implode(',', $plate['ingredients']);
            $new_plate->price = $plate['price'];
            $new_plate-> image = $plate['image'];

            $user = User::inRandomOrder()->first();
            $new_plate->user_id = $user->id;

            $new_plate->save();
        };

    }
}
