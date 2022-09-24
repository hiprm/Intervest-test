<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class saveCovidData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scd:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        \Log::info("Cron is working fine!");
        $result = app('App\Http\Controllers\CovidDataGetFromApiController')->saveCovidData();


        return "hhhhhhhhh";
    }
}
