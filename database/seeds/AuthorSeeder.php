<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Author::class, 5)->create()->each(function ($author) {
        	$author->books()->saveMany(factory(App\Book::class, 5)->make());
    	});
    }
}
