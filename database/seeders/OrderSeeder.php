<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) 
        {
            $order = Order::factory()->create();
            $lines = [];
            for ($j = 1; $j <= 10; $j++)
            {
                $products = Product::inRandomOrder()->first();
                $lines[] = [
                    'product_id' => $products->id,
                    'qty' => rand(1, 100)
                ];
            }
            $order->linesOrder()->createMany($lines);
        }
        
    }
}
