<?php

use Illuminate\Database\Seeder;

class FreelanceCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('freelance_categories')->insert([
        	'title' => 'РАЗРАБОТЧИКИ МОБИЛЬНЫХ ПРИЛОЖЕНИЙ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'ВЕБ-РАЗРАБОТЧИКИ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'IT-СПЕЦИАЛИСТЫ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'РАЗРАБОТЧИКИ ИГР'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'ВЕБ-ДИЗАЙНЕРЫ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'СММ-СПЕЦИАЛИСТЫ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'МАРКЕТОЛОГИ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'БУХГАЛТЕРЫ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'ЭКОНОМИСТЫ И ФИНАНСИСТЫ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => '3Д ГРАФИКА'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => '2Д И 3Д АНИМАЦИЯ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'ДИЗАЙН И АРТ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'ВИДЕО И ФОТОСЪЕМКА'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'ОБУЧЕНИЕ И КОНСУЛЬТАЦИЯ'
        ]);

        DB::table('freelance_categories')->insert([
        	'title' => 'ОПТИМИЗАЦИЯ(SEO)'
        ]);
    }
}
