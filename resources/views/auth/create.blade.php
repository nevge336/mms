@extends('layouts.layout')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form method="post">
                @csrf
                <div class="card-header display-6 text-center">
                    @lang('register_user')
                </div>
                <div class="card-body">
                    <div class="control-group col-12">
                        <label for="name">@lang('name')</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}">
                        @if($errors->has('name'))
                        <div class="alert alert-danger">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="username">@lang('username')</label>
                        <input type="email" id="username" name="email" class="form-control" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="password">@lang('password')</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                        <div class="alert alert-danger">
                            {{ $errors->first('password') }}
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" value="@lang('add')" class="btn btn-success">
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection