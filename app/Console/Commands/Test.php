<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add book';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('books')->insert([
            'name'=>rand(10,100).'mybook',
            'price'=> rand(10,100),
            'author'=> rand(10,100).'author1',
        ]);
    }
}
