<?php

use Illuminate\Database\Seeder;

class QuizAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_answers')->insert([
        	'quiz_id' => '1',
        	'answer' => "Нормально"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '1',
        	'answer' => "Нейтрально"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '1',
        	'answer' => "Не очень"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '2',
        	'answer' => "Отлично"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '2',
        	'answer' => "Супер"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '2',
        	'answer' => "Не как"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '3',
        	'answer' => "Американские"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '3',
        	'answer' => "Европейские"
        ]);

        DB::table('quiz_answers')->insert([
        	'quiz_id' => '3',
        	'answer' => "Средняя азия"
        ]);
    }
}
