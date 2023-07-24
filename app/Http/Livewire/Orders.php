<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class Orders extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $order_ref, $customer_name;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.orders.view', [
            'orders' => Order::latest()
						->orWhere('order_ref', 'LIKE', $keyWord)
						->orWhere('customer_name', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->order_ref = null;
		$this->customer_name = null;
    }

    public function store()
    {
        $this->validate([
		'order_ref' => 'required',
		'customer_name' => 'required',
        ]);

        Order::create([ 
			'order_ref' => $this-> order_ref,
			'customer_name' => $this-> customer_name
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Order Successfully created.');
    }

    public function edit($id)
    {
        $record = Order::findOrFail($id);

        $this->selected_id = $id; 
		$this->order_ref = $record-> order_ref;
		$this->customer_name = $record-> customer_name;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'order_ref' => 'required',
		'customer_name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Order::find($this->selected_id);
            $record->update([ 
			'order_ref' => $this-> order_ref,
			'customer_name' => $this-> customer_name
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Order Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Order::where('id', $id);
            $record->delete();
        }
    }
}
