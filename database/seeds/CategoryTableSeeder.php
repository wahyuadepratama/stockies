<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        [
          'nama' => "Desa",
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'nama' => "Budaya",
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
      ]);
    }
}
