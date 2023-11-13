<!-- Modal -->
<div wire:ignore.self class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Show Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
				<input type="hidden" wire:model="selected_id">
                <div class="form-group">
                    <label for="order_ref">Ref</label>
                    <input wire:model="order_ref" type="text" class="form-control" id="order_ref" placeholder="Order Ref" readonly>@error('order_ref') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="customer_name">Customer</label>
                    <input wire:model="customer_name" type="text" class="form-control" id="customer_name" placeholder="Customer Name" readonly>@error('customer_name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="customer_name">Total</label>
                    <input wire:model="total" type="text" class="form-control" id="customer_name" placeholder="Customer Name" readonly>@error('customer_name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                @if(count($orderLines) > 0)
                <div class="container">
                    <h5 class="modal-title" id="createDataModalLabel">Detail Order</h5>
            
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderLines as $orderLine)
                                <tr>
                                    <td>{{ $orderLine->product->name }}</td>
                                    <td>{{ $orderLine->product->cost }}</td>
                                    <td>{{ $orderLine->qty }}</td>
                                    <td>{{ $orderLine->subtotal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
       </div>
    </div>
</div>
