@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded" style="opacity: 0.8">
{{--        @auth--}}
{{--        <h1>Dashboard</h1>--}}
{{--        <p class="lead">Only authenticated users can access this section.</p>--}}
{{--        @endauth--}}

        <h1>Covid Summery</h1>
            <div class="container">
                <div class="row">
                    @isset($summery)
                        @foreach($summery as $val)
                           <div class="col-md-4" style="padding-bottom: 1%">
                               <div class="card" style="width: 18rem;">
                                   <div class="card-body">
                                       <h5 class="card-title">{{$val['title']}}</h5>
                                       <p class="card-text" style="color: darkred">{{$val['value']}}</p>
                                   </div>
                               </div>
                           </div>
                        @endforeach
                    @endisset
                </div>
            </div>

    </div>
@endsection
