<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'orders';

    protected $appends = ['total'];

    protected $fillable = ['order_ref','customer_name'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordersLines()
    {
        return $this->hasMany('App\Models\OrdersLine', 'order_id', 'id');
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
