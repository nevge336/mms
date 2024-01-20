@extends('layouts.home')
@section('content')

<div class="col-lg-12">
    <form method="post">
        @csrf
        <div class="display-6 text-center font-bruno text-white mb-2">
            @lang('register_user')
        </div>
        <div class="card">
            <div class="card-body">
                <div class="control-group col-12">
                    <label for="name">@lang('name')</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}">
                    @if($errors->has('name'))
                    <div class="alert alert-warning">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
                <div class="control-group col-12">
                    <label for="username">@lang('username')</label>
                    <input type="email" id="username" name="email" class="form-control" value="{{ old('email') }}">
                    @if($errors->has('email'))
                    <div class="alert alert-warning">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <div class="control-group col-12">
                    <label for="password">@lang('password')</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @if($errors->has('password'))
                    <div class="alert alert-warning">
                        {{ $errors->first('password') }}
                        @endif
                    </div>
                    <div class="my-3">
                        <a class="text-danger text-decoration-none" href="{{ route('login') }}">@lang('registration_question')</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-center">
            <input type="submit" value="@lang('submit')" class="btn btn-outline-warning btn-lg mt-3 font-bruno">
        </div>
    </form>

</div>
@endsection