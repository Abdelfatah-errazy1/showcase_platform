<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('Welcome to our Newsletter!')
        ->view('emails.newsletter')
        ->with([
            'subject' => 'Welcome to EZD!',
            'greeting' => 'Hello! Thank you for subscribing.',
            'introLines' => [
                'We are thrilled to have you on board.',
                'Stay tuned for the latest updates and insights from EZD.'
            ],
            'actionText' => 'Visit Us',
            'actionUrl' => url('/'),
            'outroLines' => [
                'If you have any questions, feel free to contact us.',
                'Thank you for joining us!'
            ],
        ]);
}
}