<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan',
            'email' => 'juancang@gmail.com',
            'password' => bcrypt('123123')
        ]);
        User::create([
            'name' => 'Daniel Cristobal Allendes Pulgar',
            'email' => 'r3turner_196@hotmail.com',
            'password' => bcrypt('asd13051993')
        ]);
    }
}
