<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name'=>'Karim Atef',
            'email'=>'karim@admin.com',
            'password'=>bcrypt('123456789'),
        ]);
    }
}
