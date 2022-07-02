<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\File;

class ProjectDone extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attachment, $subject)
    {
        $this->attachment = $attachment;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from("projectcamp@app.com", "ProjectCamp")->view("mail-template.mail")->attach($this->attachment)->subject($this->subject);
        // return $this->view('view.name');
    }
}
