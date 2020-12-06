<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Видеть админку',
            'code' => 'see_admin_panel',
        ]);
        Permission::create([
            'name' => 'Видеть пользователей',
            'code' => 'see_users',
        ]);
        Permission::create([
            'name' => 'Управлять пользователями',
            'code' => 'manage_users',
        ]);
    }
}
