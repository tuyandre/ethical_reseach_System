<?php

namespace App\Notifications\Device;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssigningNotification extends Notification
{
    use Queueable;
    private $assignData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($assignData)
    {
        $this->assignData=$assignData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line($this->assignData['member'])
            ->line($this->assignData['name'])
            ->line($this->assignData['body'])
            ->line($this->assignData['thanks']);
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
            $this->assignData['body']
//            'assign_id' => $this->assignData['assign_id']
        ];
    }
}
