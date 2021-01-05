<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $admin_permissions = [
            'see_news',
            'add_news',
            'edit_news',
            'delete_news',

            'see_news_comments',
            'delete_news_comments',
        ];
        $moderator_permissions = [
            'see_news',
            'edit_news',

            'see_news_comments',
            'delete_news_comments',

            'see_freelancers',
            'edit_freelancers',

            'see_startups',
            'edit_startups',
        ];

        $journalist_permissions = [
            'see_news',
            'add_news',
        ];

        $super_admin = Role::where('code', 'super_admin')->first();
        $admin = Role::where('code', 'admin')->first();
        $moderator = Role::where('code', 'moderator')->first();
        $journalist = Role::where('code', 'journalist')->first();

        foreach ($permissions as $permission) {
            $super_admin->permissions()->attach($permission);

            if ($permission->code == 'see_admin_panel') {
                $admin->permissions()->attach($permission);
                $moderator->permissions()->attach($permission);
                $journalist->permissions()->attach($permission);
            }

            if (in_array($permission->code, $admin_permissions)) {
                $admin->permissions()->attach($permission);
            }

            if (in_array($permission->code, $moderator_permissions)) {
                $moderator->permissions()->attach($permission);
            }

            if (in_array($permission->code, $journalist_permissions)) {
                $journalist->permissions()->attach($permission);
            }
        }
    }
}
