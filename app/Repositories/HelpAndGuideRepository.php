<?php

namespace App\Repositories;

use App\Models\HelpAndGuide;


class HelpAndGuideRepository
{
    public function store($save_data)
    {
        $res = HelpAndGuide::create([
            'user_id'=>$save_data['user_id'],
            'link'=>$save_data['link'],
            'description'=>$save_data['description'],
        ]);
        \Log::info("New Post Added",[$res]);
        return $res;
    }


    public function getHelpAndGuide(){
        $help_and_guide = HelpAndGuide::with(['user_details'])->get();
        \Log::info("All Help And Guides",[$help_and_guide]);
        return $help_and_guide;
    }

}
