@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add task') }}</div>
                    <form method="POST" action="{{ route('addDeveloperTsak') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Developer') }}</label>

                            <div class="col-md-6">
                                <select name="assigned_to" id="assigned_to" class="form-control">
                                    @foreach( $developers as $developer)
                                    <option value="{{$developer->id}}">{{$developer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control">
                                        <option value="created">Created</option>
                                        <option value="assigned">Assigned</option>
                                        <option value="in-progress">In-progress</option>
                                        <option value="done">Done</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>

                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-6">
                                <input type="submit" value="Add Task">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
