<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $productDetailsMail;
    public function __construct($name)
    {
        $this->productDetailsMail =$name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.order_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {

        // $attachments = [];

        // foreach ($this->productDetailsMail['orederDetails'] as $productDetails) {
        //     if (isset($productDetails['product']->image)) {
        //         $attachments[] = [
        //             'path' => storage_path('app/public/productimage/'.$productDetails['product']->image), // Path to the image
        //             'as' => $productDetails['product']->image, // Optional: Rename the attachment
        //             'mime' => 'image/jpeg', // MIME type of the attachment
        //         ];
        //     }
        // }




        //     return  $attachments;

                
        return [

        ];
            

       

        
    }
}
