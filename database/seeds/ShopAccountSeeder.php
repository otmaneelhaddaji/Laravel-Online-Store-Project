<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_shop = new App\ShopProfile;
        $seed_shop->shop_name = 'Concept Store';
        $seed_shop->shop_address = 'Batangas City';
        $seed_shop->contact_number = '09171234567';
        $seed_shop->email_address = 'concept@default.com';
        $seed_shop->save();

        DB::table('users')->insert([
            'username' => 'conceptstore',
            'password' => Hash::make('password123'),
            'user_type' => '1',
            'profile_id' => $seed_shop->id
        ]);
    }
}
