<?php

use Illuminate\Database\Seeder;

class BusinessNewsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('business_news')->insert([
        	'title' => 'BHub бизнес платформа в Шымкенте',
        	'slug' => 'bhub-bizness-platforma-v-shymkente',
        	'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'img' => 'b-img-1.jpg',		
        	]);
    	DB::table('business_news')->insert([
    		'title' => 'BHub бизнес платформа в Казахстане',
    		'slug' => 'bhub-bizness-platforma-v-kazakhstane',
    		'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    		'img' => 'b-img-2.jpg'		
    	]);
    	DB::table('business_news')->insert([
    		'title' => 'Новости мирового бизнеса',
    		'slug' => 'novosti-mirovogo-biznesa',
    		'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    		'img' => 'b-img-3.jpg',
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/j984HxX7aa0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'	
    	]);
    	DB::table('business_news')->insert([
    		'title' => 'Forbes news',
    		'slug' => 'forbes-news',
    		'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    		'img' => 'b-img-4.jpg'		
    	]);
    }
}
