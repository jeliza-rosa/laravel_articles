<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NewArticlesWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:new_articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Новые статьи за посленюю неделю';

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
        $date = strtotime('-7 days') ;

        $users = \App\Models\User::all();

        $articles = \App\Models\Article::all()->where('created_at', '>', date('Y-m-d H:i:s', $date));

        $users->map->notify(new \App\Notifications\NewArticlesWeek($articles));
    }
}
