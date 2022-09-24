@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded" style="opacity: 0.8">
    @auth
        <a  href="/create_post" class="btn btn-primary">Create New Post</a>
        @endauth
        <h1>Help And Guide</h1>
        @isset($help_and_guides)
            @foreach($help_and_guides as $value)
                <div style="padding-top: 1%">
                    <div class="card" >
                        <div class="card-header">
                            <strong> Email : </strong>{{$value['user_details']->email}} | <strong>User Name : </strong>{{$value['user_details']->username}} <span><strong>Created Date : </strong>{{date_format($value->created_at,"Y/m/d H:i:s")}}</span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$value->description}}</p>
                            <a target="_blank" href="{{$value->link}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
    </div>
@endsection
