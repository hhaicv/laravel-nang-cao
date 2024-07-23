<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogOrder
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
        // Log::debug(__CLASS__, [$event->order]);
        // Log::info('Đơn hàng đã được tạo: ', ['order' => $event->order]);
        Log::channel('database')->info('Order created: ', ['order' => $event->order]);
    }
}
