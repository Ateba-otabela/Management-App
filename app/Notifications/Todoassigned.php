<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Todoassigned extends Notification
{
    use Queueable;

    protected $todo;

    /**
     * Create a new notification instance.
     */
    public function __construct($todo) // Pass $todo as a parameter
    {
        $this->todo = $todo; // Store the assigned task
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // Send as an email and store in database
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Task Assigned')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line(optional($this->todo->assignedBy)->name . ' has assigned you a task: "' . $this->todo->task . '".')
            ->action('View Task', url('/manage_task'))
            ->line('Please complete it as soon as possible.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        //dd($this->todo->assignedBy);  
        return [
            'message' => optional($this->todo->assignedBy)->name . ' assigned you a task: "' . $this->todo->title . '".',
            'todo_id' => $this->todo->id,
        ];
    }
}
