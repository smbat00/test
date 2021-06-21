@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($result as $res)
            <div class="col-md-12">
               <h3>{{$res->name}}</h3>
            </div>
            @endforeach
        </div>
    </div>
@endsection
