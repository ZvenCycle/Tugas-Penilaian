<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'name' => 'Spring Roll Special',
                'description' => 'Lumpia crispy berisi sayuran segar, daging ayam cincang, dan udang, disajikan dengan saus asam manis spesial.',
                'price' => 25000,
                'image' => 'https://images.unsplash.com/photo-1541014741259-de529411b96a'
            ],
            [
                'name' => 'Dimsum Platter',
                'description' => 'Kombinasi dimsum premium dengan berbagai isian, disajikan dengan saus special dan sambal XO.',
                'price' => 45000,
                'image' => 'https://awsimages.detik.net.id/community/media/visual/2021/12/11/5-rekomendasi-dimsum-di-depok-yang-enak-dan-murah-buat-ngemil-3_43.png?w=600&q=90'
            ],
            [
                'name' => 'Bruschetta Caprese',
                'description' => 'Roti Italia panggang dengan topping tomat cherry, mozzarella, daun basil segar, dan balsamico glaze.',
                'price' => 35000,
                'image' => 'https://images.unsplash.com/photo-1529042410759-befb1204b468'
            ],
            [
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan bumbu rahasia, dilengkapi dengan ayam panggang, udang, telur mata sapi, dan kerupuk udang.',
                'price' => 45000,
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836'
            ],
            [
                'name' => 'Grilled Salmon Steak',
                'description' => 'Salmon segar panggang dengan saus lemon butter, disajikan dengan sayuran organik dan kentang wedges.',
                'price' => 125000,
                'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c'
            ],
            [
                'name' => 'Pasta Arrabbiata',
                'description' => 'Pasta penne dengan saus tomat pedas, bawang putih, cabai, dan daun basil segar, ditaburi parmesan.',
                'price' => 85000,
                'image' => 'https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd'
            ],
            [
                'name' => 'Ultimate Sundae',
                'description' => 'Es krim premium 3 rasa dengan topping buah segar, kacang, saus cokelat, dan whipped cream.',
                'price' => 35000,
                'image' => 'https://images.unsplash.com/photo-1551024506-0bccd828d307'
            ],
            [
                'name' => 'Molten Chocolate Cake',
                'description' => 'Kue cokelat hangat dengan lelehan cokelat di dalamnya, disajikan dengan es krim vanilla.',
                'price' => 55000,
                'image' => 'https://images.unsplash.com/photo-1587314168485-3236d6710814'
            ],
            [
                'name' => 'Classic Crème Brûlée',
                'description' => 'Custard vanilla lembut dengan lapisan gula karamel renyah, dihias dengan berry segar.',
                'price' => 65000,
                'image' => 'https://images.unsplash.com/photo-1612203985729-70726954388c'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
