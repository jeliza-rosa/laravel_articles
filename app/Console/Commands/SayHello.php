<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;

class SayHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:say_hello {users?*} {--subject=Hello} {--c|class} {--id=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправить "привет" пользователю';

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
        $users = $this->argument('users')
        ? \App\Models\User::findOrFail($this->argument('users'))
        : \App\Models\User::all();

        $subject = $this->option('subject');

        if ($this->option('class')) {
            $subject = Str::studly($subject);
        }

        $users->map->notify(new \App\Notifications\SayHello($subject));

        $this->info('Уведомление отправлено');
    }
}
