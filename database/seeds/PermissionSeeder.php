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

        Permission::create([
            'name' => 'Смотреть новости',
            'code' => 'see_news',
        ]);
        Permission::create([
            'name' => 'Добавлять новости',
            'code' => 'add_news',
        ]);
        Permission::create([
            'name' => 'Изменять новости',
            'code' => 'edit_news',
        ]);
        Permission::create([
            'name' => 'Удалять новости',
            'code' => 'delete_news',
        ]);

        Permission::create([
            'name' => 'Смотреть комментярий к новостям',
            'code' => 'see_news_comments',
        ]);
        Permission::create([
            'name' => 'Удалять комментярий к новостям',
            'code' => 'delete_news_comments',
        ]);

        Permission::create([
            'name' => 'Смотреть фрилансеров',
            'code' => 'see_freelancers',
        ]);
        Permission::create([
            'name' => 'Добавлять фрилансеров',
            'code' => 'add_freelancers',
        ]);
        Permission::create([
            'name' => 'Изменять фрилансеров',
            'code' => 'edit_freelancers',
        ]);
        Permission::create([
            'name' => 'Удалять фрилансеров',
            'code' => 'delete_freelancers',
        ]);

        Permission::create([
            'name' => 'Смотреть категории фрилансеров',
            'code' => 'see_freelancer_categories',
        ]);
        Permission::create([
            'name' => 'Добавлять категории фрилансеров',
            'code' => 'add_freelancer_categories',
        ]);
        Permission::create([
            'name' => 'Изменять категории фрилансеров',
            'code' => 'edit_freelancer_categories',
        ]);
        Permission::create([
            'name' => 'Удалять категории фрилансеров',
            'code' => 'delete_freelancer_categories',
        ]);

        Permission::create([
            'name' => 'Смотреть стартапы',
            'code' => 'see_startups',
        ]);
        Permission::create([
            'name' => 'Добавлять стартапы',
            'code' => 'add_startups',
        ]);
        Permission::create([
            'name' => 'Изменять стартапы',
            'code' => 'edit_startups',
        ]);
        Permission::create([
            'name' => 'Удалять стартапы',
            'code' => 'delete_startups',
        ]);

        Permission::create([
            'name' => 'Смотреть категории стартапов',
            'code' => 'see_startup_categories',
        ]);
        Permission::create([
            'name' => 'Добавлять категории стартапов',
            'code' => 'add_startup_categories',
        ]);
        Permission::create([
            'name' => 'Изменять категории стартапов',
            'code' => 'edit_startup_categories',
        ]);
        Permission::create([
            'name' => 'Удалять категории стартапов',
            'code' => 'delete_startup_categories',
        ]);

        Permission::create([
            'name' => 'Смотреть опросник',
            'code' => 'see_questions',
        ]);
        Permission::create([
            'name' => 'Добавлять опросник',
            'code' => 'add_questions',
        ]);
        Permission::create([
            'name' => 'Изменять опросник',
            'code' => 'edit_questions',
        ]);
        Permission::create([
            'name' => 'Удалять опросник',
            'code' => 'delete_questions',
        ]);

        Permission::create([
            'name' => 'Смотреть тарифы',
            'code' => 'see_pricings',
        ]);
        Permission::create([
            'name' => 'Добавлять тарифы',
            'code' => 'add_pricings',
        ]);
        Permission::create([
            'name' => 'Изменять тарифы',
            'code' => 'edit_pricings',
        ]);
        Permission::create([
            'name' => 'Удалять тарифы',
            'code' => 'delete_pricings',
        ]);
        Permission::create([
            'name' => 'Смотреть контакты',
            'code' => 'see_contacts',
        ]);
    }
}
