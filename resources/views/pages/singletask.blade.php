@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-center" style="border-bottom: 1px solid">
                <div class="col-md-8">
                    <div class="cart">
                        <h1>{{$singleTask->name}}</h1>
                        @if($singleTask->assigned_to == \Illuminate\Support\Facades\Auth::id())
                            <select name="status" id="status"  class="form-control status" data-taskid="{{$singleTask->id}}">
                                <option value="created">Created</option>
                                <option value="assigned">Assigned</option>
                                <option value="in-progress">In-progress</option>
                                <option value="done">Done</option>

                            </select>

                        @endif
                        <h4>{{$singleTask->status}}</h4>
                        <p>{!! $singleTask->description !!}</p>
                    </div>
                </div>

            </div>


    </div>

@endsection
