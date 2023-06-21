<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.new-user-notification')
                    ->with('data', $this->data);
    }
    public function envelope()
    {
        return new Envelope(
            subject: 'New User Notification',
        );
    }

    
    public function content()
    {
        return new Content(
            markdown: 'emails.new_user_notification',
        );
    }

    
    public function attachments()
    {
        return [];
    }
}
