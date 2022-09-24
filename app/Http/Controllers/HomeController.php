<?php

namespace App\Http\Controllers;

use App\Repositories\CovidRecordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    private $covid_details;

    public function __construct()
    {
        $this->covid_details = new CovidRecordRepository();
    }


    public function index()
    {

        $summery = $this->covid_details->getSummery();

//        dd($summery);

        return view('home.index',['summery'=>$summery]);
    }
}
