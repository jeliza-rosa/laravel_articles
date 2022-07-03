<?php

namespace App\Notifications;

use App\Models\Article;
use App\Models\Comment;
use App\Models\NewList;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class Report extends Notification
{
    use Queueable;

    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
//        var_dump($data);
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
        $result = [];
        if (!empty($this->data['news'])) {
            $result[] = 'Новостей: ' . NewList::count() . ' ';
        }
        if (!empty($this->data['articles'])) {
            $result[] = 'Статей: ' . Article::count() . ' ';
        }
        if (!empty($this->data['comments'])) {
            $result[] = 'Комментариев: ' . Comment::count() . ' ';
        }
        if (!empty($this->data['tags'])) {
            $result[] = 'Тегов: ' . Tag::count() . ' ';
        }
        if (!empty($this->data['users'])) {
            $result[] = 'Пользователей: ' . User::count() . ' ';
        }

        $resultReport = (new MailMessage)
                    ->line($result);

        return $resultReport;
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
