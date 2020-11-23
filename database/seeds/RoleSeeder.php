<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Главный Администратор',
            'code' => 'super_admin',
        ]);
        Role::create([
            'name' => 'Администратор',
            'code' => 'admin',
        ]);
        Role::create([
            'name' => 'Модератор',
            'code' => 'moderator',
        ]);
        Role::create([
            'name' => 'Журналист',
            'code' => 'journalist',
        ]);
        Role::create([
            'name' => 'Инвестор',
            'code' => 'investor',
        ]);
        Role::create([
            'name' => 'Предприниматель',
            'code' => 'entrepreneur',
        ]);
        Role::create([
            'name' => 'Работник',
            'code' => 'worker',
        ]);
        Role::create([
            'name' => 'Студент',
            'code' => 'student',
        ]);
    }
}
