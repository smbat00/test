@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($mytasks as $mytask)
        <div class="row justify-content-center" style="border-bottom: 1px solid">
            <div class="col-md-3">
                <p>{{$mytask->name}}</p>
            </div>
            <div class="col-md-3">
                <p>{{$mytask->status}}</p>
            </div>
            <div class="col-md-3">
                <p>{{$mytask->assigned_to_developer->name}}</p>
            </div>
            <div class="col-md-3">
                <ul>
                    <li><a href="{{route('edittask',$mytask->id)}}">Edit</a></li>
                    <li><a href="{{route('deletetask',$mytask->id)}}">Delete</a></li>
                </ul>
            </div>
        </div>

        @endforeach

    </div>

@endsection
