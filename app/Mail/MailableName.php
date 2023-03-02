<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailableName extends Mailable
{
    use Queueable, SerializesModels;

    protected $name = "umer";
    protected $projectID = 10;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $projectID)
    {
        $this->name=$name;
        $this->projectID = $projectID;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        
        return new Envelope(
            from: new Address('sadiqKhan@gmail.com', 'Test Sender'),
            subject: 'Project Invite',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
      
        return new Content(
            view: 'test-mail',
            with: ['name' => $this->name, 'projectID' => $this->projectID ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
