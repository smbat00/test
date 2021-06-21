@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($allTasks as $key=>$allTask)
            <div class="row justify-content-center" style="border-bottom: 1px solid">
                <div class="col-md-3">
                    <p>{{$allTask->name}}</p>
                </div>
                <div class="col-md-3">
                    <p>{{$allTask->status}}</p>
                </div>
                <div class="col-md-3">
                    <p>{{$allTask->assigned_to_developer->name}}</p>
                </div>
                <div class="col-md-3">

                        <ul>
                            <li><a href="{{route('viewsingletask',$allTask->id)}}">View Task</a></li>
                        </ul>
                </div>
            </div>

        @endforeach

    </div>

@endsection
