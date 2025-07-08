<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Makanan;
use App\Models\MenuMakanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuMakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $menu = Menu::create([
                'nama_menu' => 'Menu Makanan ' . $i,
            ]);

            $makanans = Makanan::all()->random(5);

            foreach ($makanans as $makanan) {
                MenuMakanan::create([
                    'menu_id' => $menu->id,
                    'makanan_id' => $makanan->id,
                    'isMakananPokok' => false
                ]);
            }
        }
    }
}
