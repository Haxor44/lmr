<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmation extends Notification
{
    use Queueable;
    public $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct($booking)
    {
        //
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Room Booking Confirmation')
                    ->greeting("Hello!")
                    ->line('Your room booking has been confirmed.')
                    ->line('Booking Details:')
                    ->line("Room: {$this->booking->room->name}")
                    ->line("Check-in: {$this->booking->check_in->format('M d, Y')}")
                    ->line("Check-out: {$this->booking->check_out->format('M d, Y')}")
                    ->action('View Booking', url('/confrimation'))
                    ->line('Thank you for booking with us!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
