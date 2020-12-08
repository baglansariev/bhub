<?php

use Illuminate\Database\Seeder;
use App\Models\StartupCategory;

class StartupCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StartupCategory::create([
            'name' => 'Стартапы',
            'code' => 'startups'
        ]);
        StartupCategory::create([
            'name' => 'Бизнес',
            'code' => 'business'
        ]);
        StartupCategory::create([
            'name' => 'Коммерческая недвижимость',
            'code' => 'commercial_property'
        ]);
    }
}
