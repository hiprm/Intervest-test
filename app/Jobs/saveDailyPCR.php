<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\CovidRecordRepository;


class saveDailyPCR implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pcr_test;

    private $covid_details;




    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($pcr_test)
    {
        $this->pcr_test = $pcr_test;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->covid_details = new CovidRecordRepository();
        $this->covid_details->storePcrTest($this->pcr_test);
        \Log::notice("Processing Completed",[$this->pcr_test]);
    }
}
