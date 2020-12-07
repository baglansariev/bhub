<?php

use Illuminate\Database\Seeder;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('freelancer')->insert([
        	'category_id' => 1,
        	'name' => 'Adilet',
        	'position' => 'РАЗРАБОТЧИКИ МОБИЛЬНЫХ ПРИЛОЖЕНИЙ',
        	'img' => 'freelancer.jpg',
        	'facebook' => '#',
        	'instagramm' => '#',
        	'created_at' => Carbon\Carbon::now()
        ]);

        DB::table('freelancer')->insert([
        	'category_id' => 2,
        	'name' => 'Vasily',
        	'position' => 'ВЕБ-РАЗРАБОТЧИКИ',
        	'img' => 'freelancer.jpg',
        	'facebook' => '#',
        	'instagramm' => '#',
        	'created_at' => Carbon\Carbon::now()
        ]);

        DB::table('freelancer')->insert([
        	'category_id' => 3,
        	'name' => 'Jon Doe',
        	'position' => 'IT-СПЕЦИАЛИСТЫ',
        	'img' => 'freelancer.jpg',
        	'facebook' => '#',
        	'instagramm' => '#',
        	'created_at' => Carbon\Carbon::now()
        ]);

        DB::table('freelancer')->insert([
        	'category_id' => 4,
        	'name' => 'Mat Zanstra',
        	'position' => 'РАЗРАБОТЧИКИ ИГР',
        	'img' => 'freelancer.jpg',
        	'facebook' => '#',
        	'instagramm' => '#',
        	'created_at' => Carbon\Carbon::now()
        ]);
    }
}
