<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendOrderNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $data = [ 'name' => $event->order->product_name,
                  'quantity' => $event->order->quantity,
                  'price' => $event->order->price,
    ];

        Mail::send('mail', $data, function ($message) {
            $message->to('haimhph33857@fpt.edu.vn', 'Tutorials Point')
                ->subject('Laravel Basic Testing Mail');
        });
        Log::debug("Basic Email Sent. Check your inbox.");

    }
}
