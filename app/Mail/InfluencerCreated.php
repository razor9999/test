<?php

namespace App\Mail;

use App\Influencer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InfluencerCreated extends Mailable
{
    use Queueable, SerializesModels;



    protected $influencer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Influencer $influencer)
    {
        //
        $this->influencer = $influencer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.influencer.created')->with([
            'name' => $this->influencer->name
        ]);
    }
}
