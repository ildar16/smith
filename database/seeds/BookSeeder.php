<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Book::class, 5)->create()->each(function ($book) {
        	$book->authors()->saveMany(factory(App\Author::class, 5)->make());
    	});
    }
}
