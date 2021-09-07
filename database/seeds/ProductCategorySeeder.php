<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sruo Kien',
            'email' => 'sruo.kien@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
