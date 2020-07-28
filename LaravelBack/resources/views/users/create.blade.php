@extends('layouts.layout')

@section('title')
    Add User
@endsection

@section('content')
    <div class="container-fluid">
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        {!! Form::open(['route' => 'users.store']) !!}
        <div class="row">
            <div class="col-12">
                <label for="name">Name</label>
                <input class="form-control" id="name" name="name">
                @error('name')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>
    <br/>
        <div class="row">
            <div class="col-12">
                {{ Form::label('Email') }}
                {{ Form::text('email', '', ['class' => 'form-control']) }}

            </div>
        </div>
    <br/>
        <div class="row">
            <div class="col-12">
                {{ Form::passwordField('password', []) }}
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                {{ Form::submit('Store', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
