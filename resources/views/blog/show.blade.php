@extends('layouts.layout')
@section('content')

<div class="row bg-light rounded justify-content-center">
    <div class="col-12 col-md-10 pt-2">
        <a href="{{ route('blog.index')}}" class="btn btn-primary mb-3">@lang('back')</a>
        <div class="card">
            <div class="card-body p-md-5">
                <h4 class="card-title display-6 mt-2">
                    {{ ucwords($blogPost->title) }}
                </h4>
                <hr>
                <p class="card-text">
                    {!! $blogPost->content !!}
                </p>
                <p class="text-muted">
                    <strong>@lang('author'):</strong>
                    <a href="{{ route('students.show', $blogPost->user->student->id) }}">
                        {{ $blogPost->user->name }}
                    </a><br>
                    <strong>@lang('published'):</strong> {{ $blogPost->date }}<br>
                </p>
                @if(Auth::user() && Auth::user()->id == $blogPost->user_id)
                <div>
                    <a href="{{ route('blog.edit', $blogPost->id)}}" class="btn btn-primary">@lang('modify')</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        @lang('delete')
                    </button>
                </div>
                @endif
            </div>

        </div>

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