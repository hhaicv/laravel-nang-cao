<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Stock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateStock
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
        $stock = Stock::where('product_name', $event->order->product_name)->first();
        if ($stock) {
            $stock->quantity -= $event->order->quantity;
            $stock->save();
        }
    }
}
