<?php

namespace App\Notifications\Frontend\Job;

use App\Models\Access\User\User;
use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class UserEnroll extends Notification
{
    use Queueable;

    protected $enroll_user;
    protected $job;

    /**
     * Create a new notification instance.
     *
     * @param User $enroll_user
     * @param Job $job
     */
    public function __construct(User $enroll_user, Job $job)
    {
        $this->enroll_user = $enroll_user;
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', 'https://laravel.com')
//                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
//            'enroll_user' => $this->enroll_user->name,
//            'job_name'      => $this->job->title,
            'message' => $this->enroll_user->name . ' has enrolled the job ' . $this->job->title,
        ];
    }
}
