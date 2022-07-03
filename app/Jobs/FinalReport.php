<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\NewList;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\Report;

class FinalReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Notifiable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $newsCount = NewList::count();
        $articlesCount = Article::count();
        $commentsCount = Comment::count();
        $tagsCount = Tag::count();
        $usersCount = User::count();

        echo $newsCount;
    }
}
