<?php

namespace App\Repositories;

use App\Models\Summery;
use App\Models\DailyPcrTesting;

class CovidRecordRepository
{
    public function store($save_data)
    {
        Summery::truncate();
        $res = Summery::create([
            'date'=>$save_data['update_date_time'],
            'local_new_cases'=>$save_data['local_new_cases'],
            'local_total_cases'=>$save_data['local_total_cases'],
            'local_total_number_of_individuals_in_hospitals'=>$save_data['local_total_number_of_individuals_in_hospitals'],
            'local_deaths'=>$save_data['local_deaths'],
            'local_new_deaths'=>$save_data['local_new_deaths'],
            'local_recovered'=>$save_data['local_recovered'],
            'local_active_cases'=>$save_data['local_active_cases'],
            'global_new_cases'=>$save_data['global_new_cases'],
            'global_total_cases'=>$save_data['global_total_cases'],
            'global_deaths'=>$save_data['global_deaths'],
            'global_new_deaths'=>$save_data['global_new_deaths'],
            'global_recovered'=>$save_data['global_recovered']
        ]);
        \Log::info("summery table successfully stored API Data",[$res]);
        return $res;
    }

    public function storePcrTest($pcr_test)
    {
        $is_exist = DailyPcrTesting::where('date', '=', $pcr_test[0]['date'])->first();
        if ($is_exist === null) {
            $res=DailyPcrTesting::create([
                'date'=>$pcr_test[0]['date'],
                'pcr_count'=>$pcr_test[0]['pcr_count'],
            ]);
            \Log::info("Save PCR Test Record To daily_pcr_testing Table",[$pcr_test]);
            return $res;
        }else{
            \Log::warning("This Record Already Exist",[$pcr_test]);
        }
    }

    public function getSummery(){
        $summery = Summery::all();

        $total_pcr_testing = DailyPcrTesting::sum('pcr_count');

       $summery_result= [
            ['title'=>'Local New Cases', 'value'=>$summery[0]['local_new_cases']],
            ['title'=>'Local Total Cases', 'value'=>$summery[0]['local_total_cases']],
            ["title"=>'Local Total Number of Individuals In Hospitals','value'=>$summery[0]['local_total_number_of_individuals_in_hospitals']],
            ["title"=>'Local Deaths','value'=>$summery[0]['local_deaths']],
            ["title"=>'Local New Deaths','value'=>$summery[0]['local_new_deaths']],
            ["title"=>'Local Recovered','value'=>$summery[0]['local_recovered']],
            ["title"=>'Local Active Cases','value'=>$summery[0]['local_active_cases']],
            ["title"=>'Global New Cases','value'=>$summery[0]['global_new_cases']],
            ["title"=>'Global Total Cases','value'=>$summery[0]['global_total_cases']],
            ["title"=>'Global Deaths','value'=>$summery[0]['global_deaths']],
            ["title"=>'Global New deaths','value'=>$summery[0]['global_new_deaths']],
            ["title"=>'Total Pcr Testing Count','value'=>$total_pcr_testing],
        ];
        return $summery_result;
    }

}
