<?php

namespace App\Console\Commands;

use App\Jobs\costTotalOrder;
use Illuminate\Console\Command;

class calcularCostTotalOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:calculateCostTotal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para calcular el costo total de las ordenes *-*';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        costTotalOrder::dispatch();
    }
}
