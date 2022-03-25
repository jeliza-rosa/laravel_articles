<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\User;
use App\Notifications\NewArticlesWeek as NewArticlesWeekNotification;

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $periodDays = 7;

        $date = strtotime('-' . $periodDays . ' days') ;

        $users = User::all();

        $articles = Article::all()->where('created_at', '>', date('Y-m-d H:i:s', $date));

        $users->map->notify(new NewArticlesWeekNotification($articles, $periodDays));
    }
}
