<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('keywords')->insert([
        [
          'nama' => "Indonesia",
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'nama' => "Suku",
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
      ]);
    }
}
