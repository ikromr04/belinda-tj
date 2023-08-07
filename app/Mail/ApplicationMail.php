<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
  use Queueable, SerializesModels;

  public $details, $file;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($details, $file)
  {
    $this->details = $details;
    $this->file = $file;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    if ($this->file) {
      return $this->subject($this->details['vacancy'])->view('emails.application')->attach(
        $this->file->getRealPath(),
        [
          'as' => $this->file->getClientOriginalName(),
          'mime' => $this->file->getClientMimeType(),
        ]
      );
    }

    return $this->subject($this->details['vacancy'])->view('emails.application');
  }
}
