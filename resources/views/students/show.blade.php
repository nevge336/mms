@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>

        <div class="col-12 col-md-6 pt-2">
            <a href="{{ route('students.index')}}" class="btn btn-outline-primary">Retourner</a>
            <div class="card-header display-6">
                <h4 class="display-6 mt-5">
                    {{ $student->user->name }}
                </h4>
                <hr>
            </div>
            <p>
                <strong>Adresse:</strong> {{ $student->address }}
            </p>
            <p>
                <strong>Téléphone:</strong> {{ $student->phone }}
            </p>
            <p>
                <strong>Courriel:</strong> {{ $student->user->email }}
            </p>
            <p>
                <strong>Date de naissance:</strong> {{ $student->birthday }}
            </p>
            <p>
                <strong>Ville:</strong> {{ $student->city ? $student->city->name : 'N/A' }}
            </p>
            <div class="d-flex mt-5">
                <a href="{{ route('students.edit', $student->id)}}" class="btn btn-primary me-2">Modifier</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Effacer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer les données</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Etes-vous sûr de vouloir effacer ce profil étudiant?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <form method="post" action="{{ route('students.destroy', $student->id) }}">
            @csrf
            @method('delete')
            <input type="submit" value="Effacer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection