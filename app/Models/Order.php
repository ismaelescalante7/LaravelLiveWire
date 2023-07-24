<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_ref',
        'customer_name'
    ];

    protected $appends = ['total'];

    public function linesOrder(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function getTotalAttribute($value)
    {
        $lines = $this->linesOrder;
        return  $lines->sum(function ($line) {
            return $line->subtotal;
        });;
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value;
    }
}