<?php

use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            'medicine_name' => Str::random(10),
            'medicine_quantity' => 10,
            'medicine_type' => Str::random(10),
            'medicine_price' =>25,
        ]);
        factory(App\Medicine::class, 500)->create();
    }
}
