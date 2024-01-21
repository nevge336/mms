@extends('layouts.layout')
@section('content')

<div class="row bg-light p-3 rounded">
    <div class="col-12 pt-2">
        <a href="{{ route('blog.index')}}" class="btn btn-primary mb-3">@lang('back')</a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title display-6 mt-2">
                    {{ $blogPost->title }}
                </h4>
                <hr>
                <p class="card-text">
                    {!! $blogPost->content !!}
                </p>
                <p class="text-muted">
                    <strong>@lang('author'):</strong> {{ $blogPost->user->name }}<br>
                    <strong>Date:</strong> {{ $blogPost->date }}<br>
                </p>
            </div>
        </div>
        @if(Auth::user() && Auth::user()->id == $blogPost->user_id)
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('blog.edit', $blogPost->id)}}" class="btn btn-primary">@lang('modify')</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        @lang('delete')
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer la donnée</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Etes-vous sûr de efffacer la donnée?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                <form method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Effacer" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection