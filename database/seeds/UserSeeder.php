<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Баглан Сариев',
            'role_id' => 1,
            'phone' => '+77024441143',
            'email' => 'baglansariev@mail.ru',
            'password' => Hash::make(12345678),
        ]);
    }
}
