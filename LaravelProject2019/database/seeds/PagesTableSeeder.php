<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'Home Page',
                'slug' => 'home',
                'content' => 'This is the Home page'
            ],
            [
                'title' => 'About Page',
                'slug' => 'about',
                'content' => 'This is the about page'
            ],
            [
                'title' => 'Contact Page',
                'slug' => 'contact',
                'content' => 'This is the contact page'
            ]
        ]

        );
    }
}
