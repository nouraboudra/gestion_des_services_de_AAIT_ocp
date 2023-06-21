<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

 
    public function __construct()
    {
        //
    }
    public function build()
    {
        return $this->subject('Account Created')
                    ->view('emails.user-created')
                    ->with([
                        'matricule' => $this->data['matricule'],
                        'password' => $this->data['password'],
                    ]);
    }
   
    public function envelope()
    {
        return new Envelope(
            subject: 'User Created',
        );
    }

    
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    
    public function attachments()
    {
        return [];
    }
}
