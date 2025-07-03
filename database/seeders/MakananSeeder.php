<?php

namespace Database\Seeders;

use App\Models\Makanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makanan = new Makanan();


        $files = File::files(public_path('sample-gambar'));
        $typeMakanan = ['Makanan','Minuman'];
        $typeProtein = ['Hewani','Nabati'];

        for($i=1; $i<count($files); $i++) {
            $makanan = new Makanan();
            $makanan->gambar_makanan = 'sample-gambar/'. $files[$i]->getFilename();
            $makanan->nama_makanan = 'Makanan '.$i;
            $makanan->type_protein = $typeProtein[array_rand($typeProtein)];
            $makanan->type_makanan = $typeMakanan[array_rand($typeMakanan)];
            $makanan->protein = rand(1,1000);
            $makanan->karbohidrat = rand(1,1000);
            $makanan->lemak = rand(1,1000);
            $makanan->asam_folat = rand(1,1000);
            $makanan->save();
        }
    }
}
