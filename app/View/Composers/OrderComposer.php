<?php

namespace App\View\Composers;

use App\Models\Order;
use Illuminate\View\View;

class OrderComposer
{
    private function getOrderWaitingCount(): int
    {
        if (!request()->user() || request()->user()->is_admin === false) {
            return 0;
        }

        return Order::query()
            ->where('status', 'WAITING_CONFIRMATION')
            ->get()
            ->count();
    }

    public function compose(View $view): void
    {
        $view->with('order_waiting_count', $this->getOrderWaitingCount());
    }
}
