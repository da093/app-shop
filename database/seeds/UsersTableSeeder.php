    
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
            'name' => 'Daniel',
            'email' => 'r3turner_196@hotmail..com',
            'password' => bcrypt('asd13051993'),
            'admin' => true
        ]);
    }
}