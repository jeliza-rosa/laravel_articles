<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleCreate extends Notification
{
    use Queueable;

    public $article;
    public $action;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($article, $action)
    {
        $this->article = $article;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = new MailMessage;
//        if ($this->action == 'store') {
//            return $message
//            ->line('Создана статья:')
//            ->line($this->article->name)
//            ->action('Перейти к статье', url('/articles/' . $this->article->code));
//        } elseif ($this->action == 'update') {
//            return $message
//                ->line('Статья изменена:')
//                ->line($this->article->name)
//                ->action('Перейти к статье', url('/articles/' . $this->article->code));
//        } elseif ($this->action == 'destroy') {
//            return $message
//                ->line('Статья удалена:')
//                ->line($this->article->name);
//        }

        if ($this->action == 'store') {
            $textAction = 'Создана статья:';
            $textBtn = 'Перейти к статье';
            $link = '/articles/' . $this->article->code;
        } elseif ($this->action == 'update') {
            $textAction = 'Статья изменена:';
            $textBtn = 'Перейти к статье';
            $link = '/articles/' . $this->article->code;
        } elseif ($this->action == 'destroy') {
            $textAction = 'Статья удалена:';
            $textBtn = 'Перейти на сайт';
            $link = '/';
        }

        return $message
            ->line($textAction)
            ->line($this->article->name)
            ->action($textBtn, $link);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
