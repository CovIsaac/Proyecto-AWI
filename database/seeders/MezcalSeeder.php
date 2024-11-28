<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MezcalSeeder extends Seeder
{
    public function run()
    {
        DB::table('mezcales')->insert([
            [
                'id' => 1,
                'name' => 'Hospital para Alérgicos',
                'description' => 'Este mezcal tiene un suave sabor a almendra, perfecto para aquellos que disfrutan de notas dulces y ligeramente amargas.',
                'flavor' => 'Almendra',
                'image' => 'assets/mezcal_images/Almendra.jpg',
            ],
            [
                'id' => 2,
                'name' => 'El Dulce Pecado',
                'description' => 'Con un delicioso toque de cajeta, este mezcal combina la dulzura del caramelo con la robustez del agave, ideal para los amantes de los sabores más complejos.',
                'flavor' => 'Cajeta',
                'image' => 'assets/mezcal_images/Cajeta.jpg',
            ],
            [
                'id' => 3,
                'name' => 'El Tigre Parra',
                'description' => 'Un mezcal con notas intensas de chocolate oscuro, perfecto para quienes disfrutan de sabores ricos y profundos.',
                'flavor' => 'Chocolate',
                'image' => 'assets/mezcal_images/Chocolate.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Coco Loco',
                'description' => 'Este mezcal ofrece un refrescante sabor a coco, ideal para momentos de relajación bajo el sol.',
                'flavor' => 'Coco',
                'image' => 'assets/mezcal_images/Coco.jpg',
            ],
            [
                'id' => 5,
                'name' => 'La Bomba Frutal',
                'description' => 'Con un toque afrutado y ligeramente ácido, este mezcal de frambuesa es perfecto para quienes buscan un sabor fresco y vibrante.',
                'flavor' => 'Frambuesa',
                'image' => 'assets/mezcal_images/Frambuesa.jpg',
            ],
            [
                'id' => 6,
                'name' => 'Exótica Aventura',
                'description' => 'Un mezcal único con el sabor del jobito, una fruta exótica que aporta un perfil dulce y floral.',
                'flavor' => 'Jobito',
                'image' => 'assets/mezcal_images/Jobito.jpg',
            ],
            [
                'id' => 7,
                'name' => 'Mango Tango',
                'description' => 'Este mezcal tropical está infusionado con el dulce y jugoso sabor del mango.',
                'flavor' => 'Mango',
                'image' => 'assets/mezcal_images/Mango.jpg',
            ],
            [
                'id' => 8,
                'name' => 'Mazapán Manía',
                'description' => 'Con un sabor que recuerda al tradicional mazapán, este mezcal es una verdadera delicia para los amantes de los dulces.',
                'flavor' => 'Mazapán',
                'image' => 'assets/mezcal_images/Mazapan.jpg',
            ],
            [
                'id' => 9,
                'name' => 'Nuez de la Suerte',
                'description' => 'Este mezcal tiene un sutil y agradable sabor a nuez, perfecto para aquellos que disfrutan de notas suaves y tostadas.',
                'flavor' => 'Nuez',
                'image' => 'assets/mezcal_images/Nuez.jpg',
            ],
            [
                'id' => 10,
                'name' => 'Fiesta Tropical',
                'description' => 'Con el refrescante y tropical sabor de la piña colada, este mezcal es ideal para los días de verano.',
                'flavor' => 'Piña Colada',
                'image' => 'assets/mezcal_images/Piña Colada.jpg',
            ],
            [
                'id' => 11,
                'name' => 'Piñón Poderoso',
                'description' => 'Este mezcal tiene un sabor delicado y distintivo a piñón, perfecto para aquellos que buscan una experiencia única.',
                'flavor' => 'Piñón',
                'image' => 'assets/mezcal_images/Piñon.jpg',
            ],
            [
                'id' => 12,
                'name' => 'El Verde Emperador',
                'description' => 'Con un suave y cremoso sabor a pistache, este mezcal es una delicia para el paladar.',
                'flavor' => 'Pistache',
                'image' => 'assets/mezcal_images/Pistache.jpg',
            ],
            [
                'id' => 13,
                'name' => 'Abuela Contentilla',
                'description' => 'Este mezcal tiene un delicioso y cremoso sabor a rompope, ideal para celebrar ocasiones especiales.',
                'flavor' => 'Rompope',
                'image' => 'assets/mezcal_images/Rompope.jpg',
            ],
        ]);
    }
}
