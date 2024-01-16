@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center my-3">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>


    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 mx-0">
        <div class="mb-3">
            <a href="{{route('students.create')}}" class="btn btn-primary">Ajouter</a>
        </div>
            <div class="card">
                <div class="card-header">
                    <div class="col-12">
                        <form class="row g-3" role="search" action="{{ route('students.index') }}" method="GET">
                            <div class="col-12 col-sm-7">
                                <input class="form-control" type="text" name="search" aria-label="rechercher" />
                            </div>
                            <div class="col-12 col-sm-5">
                                <button class="btn btn-outline-success w-100" type="submit">rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($students as $student)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <ul>
                                <li><a href="{{ route('students.show', $student->id)}}">{{ $student->name }}</a></li>
                            </ul>
                        </div>
                        @empty
                        <div class="col-12">
                            <ul>
                                <li class="text-danger">Aucun étudiant n'est inscrit !</li>
                            </ul>
                        </div>
                        @endforelse
                    </div>
                </div>            {{ $students->appends(['search' => request()->get('search')])->links() }}
        </div>
    </div>
</div>

@endsection