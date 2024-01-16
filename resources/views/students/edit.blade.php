@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card">
                <form method="post">
                    @method('put')
                    @csrf
                    <div class="card-header display-6 text-center">
                        Modifier
                    </div>
                    <div class="card-body">
                        <div class="control-group col-12 mb-4">
                            <label for="name"><strong>Nom</strong></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $student->name }}">
                        </div>

                        <div class="control-group col-12 mb-4">
                            <label for="address"><strong>Adresse</strong></label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $student->address }}">
                        </div>

                        <div class="control-group col-12 mb-4">
                            <label for="phone"><strong>Téléphone</strong></label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $student->phone }}">
                        </div>

                        <div class="control-group col-12 mb-4">
                            <label for="email"><strong>Courriel</strong></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $student->email }}">
                        </div>

                        <div class="control-group col-12 mb-4">
                            <label for="birthday"><strong>Date de naissance</strong></label>
                            <input type="date" id="birthday" name="birthday" class="form-control" value="{{ $student->birthday }}">
                        </div>

                        <div class="control-group col-12 mb-4">
                            <label for="city_id"><strong>Ville</strong></label>
                            <select id="city_id" name="city_id" class="form-control">
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $student->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" value="Modifier" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection