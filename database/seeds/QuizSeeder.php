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
        	'post_id' => '1'
        ]);

        DB::table('quizs')->insert([
        	'question' => 'Как вы относитесь к подобным платформам в нашей стране?',
        	'post_id' => '2'
        ]);

        DB::table('quizs')->insert([
        	'question' => 'Какие компании в мире, больше всего вносят вклад в мировые новости?',
        	'post_id' => '3'
        ]);
    }
}
