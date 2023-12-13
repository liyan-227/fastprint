<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert(
            ['kategori' => 'L QUEENLY'],
            [ 'kategori' => 'L MTH AKSESORIS']
            ,[ 'kategori' => 'L MTH TABUNG ']
            ,[ 'kategori' => 'SP MTH SPAREPART']
            ,[ 'kategori' => 'CI MTH TINTA LAIN']
            ,[ 'kategori' => 'S MTH STEMPEL (IM)']



        );
    }
}
