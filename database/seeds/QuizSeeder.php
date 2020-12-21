<?php

use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizs')->insert([
        	'question' => 'Как вы относитесь к подобным платформам в нашем городе?',
        	'business_news_id' => '1'
        ]);

        DB::table('quizs')->insert([
        	'question' => 'Как вы относитесь к подобным платформам в нашей стране?',
        	'business_news_id' => '2'
        ]);

        DB::table('quizs')->insert([
        	'question' => 'Какие компании в мире, больше всего вносят вклад в мировые новости?',
        	'business_news_id' => '3'
        ]);
    }
}
