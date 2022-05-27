<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(100)->create();
        User::create([
            'status'            => '1',
            'name'              => 'omar',
            'email'             => 'omar@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('12qwaszx'),
            'image'             => 'https://ecuadorendirecto.com/wp-content/uploads/2020/12/03-taylor-swift-press-cr-Beth-Garrabrant-2020-billboard-1548-1607617377-compressed.jpg',
            'remember_token'    => Str::random(20),
        ])->assignRole('admin');
        User::create([
            'status'            => '1',
            'name'              => 'caca',
            'email'             => 'caca@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('12qwaszx'),
            'image'             => 'https://ecuadorendirecto.com/wp-content/uploads/2020/12/03-taylor-swift-press-cr-Beth-Garrabrant-2020-billboard-1548-1607617377-compressed.jpg',
            'remember_token'    => Str::random(20),
        ])->assignRole('user');
    }
}
