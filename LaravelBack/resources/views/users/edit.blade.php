@extends('layouts.layout')

@section('title')
    Edit User
@endsection

@section('content')
        <div class="container-fluid">
        {!! Form::open(['route' => ['users.update', $user->id ], 'method' => "PUT"]) !!}
{{--        @method('PUT');--}}
        <div class="row">
            <div class="col-12">
                <label for="name">Name</label>
                <input class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
        </div>
    <br/>
        <div class="row">
            <div class="col-12">
                {{ Form::label('Email') }}
                {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
            </div>
        </div>
    <br/>

        <div class="row">
            <div class="col-12">
                {{ Form::submit('Store', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
