<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking)
    {
        //
        $this->booking = $booking;
        //$this->mailer('reservations');
    }

    public function build()
{
    return $this
        ->from('reservations@lanetmatfamresort.co.ke', 'Reservations Department')
        ->mailer('reservations') // Use custom mailer
        ->subject('Booking Confirmation')
        ->view('emails.booking_confirmation')
        ->with(['booking' => $this->booking]);
}

    
}
