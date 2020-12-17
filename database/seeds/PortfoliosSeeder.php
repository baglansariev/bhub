<?php

use Illuminate\Database\Seeder;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->insert([
        	'title' => 'Портфолио 1',
        	'slug' => 'portfolio-1',
        	'url' => '#',
        	'img' => '1.jpg',
        	'freelancer_id' => '1'	
        ]);

        DB::table('portfolios')->insert([
        	'title' => 'Портфолио 2',
        	'slug' => 'portfolio-2',
        	'url' => '#',
        	'img' => '2.jpg',
        	'freelancer_id' => '1'	
        ]);

        DB::table('portfolios')->insert([
        	'title' => 'Портфолио 3',
        	'slug' => 'portfolio-3',
        	'url' => '#',
        	'img' => '3.jpg',
        	'freelancer_id' => '1'	
        ]);
    }
}
