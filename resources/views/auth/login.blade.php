@extends('layouts.home')
@section('content')

<div class="col-lg-12">

    <form action="{{ route('authentication') }}" method="post">
        @csrf
        <div class="display-6 text-center font-bruno text-white mb-2">
            Login
        </div>
        <div class="card">
            <div class="card-body">
                @if(!$errors->isEmpty())
                <div class="alert alert-warning">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="control-group col-12">
                    <label for="username">@lang('username')</label>
                    <input type="email" id="username" name="email" class="form-control" value="{{ old('email')}}">
                    @if($errors->has('email'))
                    <span class="text-warning">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="control-group col-12">
                    <label for="password">@lang('password')</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @if($errors->has('password'))
                    <span class="text-warning">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="text-right my-3">
                    <a class="text-danger text-decoration-none" href="{{ route('registration') }}">@lang('login_question')</a>
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" value="Connect" class="btn btn-outline-warning btn-lg mt-5 font-bruno">
        </div>
    </form>
</div>
@endsection