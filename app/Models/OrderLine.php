<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLine extends Model
{
    use HasFactory;

    protected $table = 'orders_lines';

    protected $fillable = [
        'product_id',
        'order_id',
        'qty'
    ];

    protected $appends = ['subtotal'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    ## OrderLine::create('order_id' => 1, 'product_id' => 1 , 'qty' => 7)
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getSubtotalAttribute()
    {
        $this->load('product');
        return $this->qty * $this->product['cost'];
    }
}
