<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Book;
use Carbon\Carbon;

class RemoveBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удалит книги, опубликованные более года назад';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $books = Book::where('date', '<', Carbon::now()->subDays(365))->delete();

        if ($books) {
            echo "Успешно удалено!\n";
        }
    }
}
