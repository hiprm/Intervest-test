<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Repositories\CovidRecordRepository;
use GuzzleHttp\Exception\RequestException;
use App\Jobs\saveDailyPCR;



class CovidDataGetFromApiController extends Controller
{
    private $covid_details;

    public function __construct()
    {
        $this->covid_details = new CovidRecordRepository();
    }

    public function saveCovidData(){

        \Log::info("saveCovidDataController@saveCovidData Function Called");
        try {
            $response = Http::get('https://hpb.health.gov.lk/api/get-current-statistical');
            \Log::info('Api Call Response',[$response]);

            $this->covid_details->store($response['data']);

            foreach ($response['data']['daily_pcr_testing_data'] as $pcr_test){
                $pcr_test = [$pcr_test];
                dispatch(new saveDailyPCR($pcr_test));
                \Log::info("Save Daily PCR test",[$pcr_test]);
            }

        } catch (RequestException $e) {
            \Log::error("API Call Error",$e);
        }

    }
}
