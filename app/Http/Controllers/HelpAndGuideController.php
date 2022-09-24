<?php

namespace App\Http\Controllers;

use App\Repositories\HelpAndGuideRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HelpAndGuideController extends Controller
{

    private $help_and_guide;

    public function __construct()
    {
        $this->help_and_guide = new HelpAndGuideRepository();
    }


    public function index()
    {
        $help_and_guides = $this->help_and_guide->getHelpAndGuide();
        return view('help-and-guide',['help_and_guides'=>$help_and_guides]);
    }

    public function create(Request $request){

        return view('create_post');
    }

    public function store(Request $request){
        $request->validate([
            'description' => 'required',
            'link' => 'required|url',
        ]);

        $user = auth()->user();

        $create_post = $this->help_and_guide->store(['description'=>$request->description,
            'link'=>$request->link,
            'user_id'=>$user->id
            ]);

        return redirect()->route('help-guide')
            ->with('success','User created successfully.');
    }
}
