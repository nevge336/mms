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
                <div class="my-3">
                    <a class="text-danger text-decoration-none" href="{{ route('login') }}">@lang('registration_question')</a>
                </div>

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
                    </div>
                    @endif
                </div>
                <div class="control-group col-12">
                    <label for="address">Adresse</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="control-group col-12">
                    <label for="phone">Téléphone</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="control-group col-12">
                    <label for="birthday">Date de naissance</label>
                    <input type="date" id="birthday" name="birthday" class="form-control" value="{{ old('birthday') }}">
                    @error('birthday')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="control-group col-12">
                    <label for="city_id">Ville</label>
                    <select id="city_id" name="city_id" class="form-control">
                        <option value="">Sélectionner une ville</option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
        <div class="card-footer text-center">
            <input type="submit" value="@lang('submit')" class="btn btn-outline-warning btn-lg mt-3 font-bruno">
        </div>
    </form>
</div>
@endsection