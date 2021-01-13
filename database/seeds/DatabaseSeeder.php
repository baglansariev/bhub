<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
         $this->call(PermissionSeeder::class);
         $this->call(RolePermissionsSeeder::class);
         $this->call(BusinessNewsTable::class);
         $this->call(StartupCategorySeeder::class);
         $this->call(FreelanceCategoriesSeeder::class);
         $this->call(FreelancerSeeder::class);
         $this->call(PortfoliosSeeder::class);
         $this->call(QuizSeeder::class);
         $this->call(QuizAnswersSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(ContactsSeeder::class);
    }
}
