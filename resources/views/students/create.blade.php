@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <form method="post">
                    @csrf
                    <div class="card-header display-6 text-center">
                        Ajouter un.e étudiant.e
                    </div>
                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="name">Nom</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                            <label for="email">Courriel</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="control-group col-12">
                            <label for="birthday">Date de naissance</label>
                            <input type="date" id="birthday" name="birthday" class="form-control" value="{{ old('birthday') }}">
                            @error('birthday')
                            <div class="alert alert-danger">{{ $message }}</div>
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
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="Ajouter" class="btn btn-success">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection