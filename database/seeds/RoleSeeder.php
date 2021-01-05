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
            'is_system_role' => 1,
            'is_staff' => 1
        ]);
        Role::create([
            'name' => 'Администратор',
            'code' => 'admin',
            'is_system_role' => 1,
            'is_staff' => 1
        ]);
        Role::create([
            'name' => 'Модератор',
            'code' => 'moderator',
            'is_system_role' => 1,
            'is_staff' => 1
        ]);
        Role::create([
            'name' => 'Журналист',
            'code' => 'journalist',
            'is_system_role' => 1,
            'is_staff' => 1
        ]);
        Role::create([
            'name' => 'Инвестор',
            'code' => 'investor',
            'is_system_role' => 1,
        ]);
        Role::create([
            'name' => 'Предприниматель',
            'code' => 'entrepreneur',
            'is_system_role' => 1,
        ]);
        Role::create([
            'name' => 'Работник',
            'code' => 'worker',
            'is_system_role' => 1,
        ]);
        Role::create([
            'name' => 'Студент',
            'code' => 'student',
            'is_system_role' => 1,
        ]);
    }
}
