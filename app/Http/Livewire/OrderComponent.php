<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderComponent extends Component
{

    public function render()
    {
        return view('livewire.order-component', [
            'orders' => Order::all(),
        ]);
    }
}
