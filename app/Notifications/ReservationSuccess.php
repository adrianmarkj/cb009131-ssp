<?php

namespace App\Notifications;

use App\Models\Finance\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationSuccess extends Notification
{
    use Queueable;

    public Subscription $subscription;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
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
        return (new MailMessage)
            ->subject('Buttercup Events - Ticket Purchase Success')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Your reservation has been successfully placed.')

            ->line('Reservation ID: ' . $this->subscription->id)
            ->line('Event: ' . $this->subscription->event->name)
            ->line('Number of People: ' . $this->subscription->number_of_people)
            ->line('Total Price: LKR ' . number_format($this->subscription->total_price, 2))

            ->action('View Reservation', url(route('reservation.index')))
            ->line('Thank you for using Buttercup Events!');
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
