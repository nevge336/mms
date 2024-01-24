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

        <!-- Student Profile Box -->
        <div class="col-12 pt-2">
            <h1 class="display-6 font-bruno">@lang('my_profile')</h1>
            <div class="card">
                <div class="card-body">
                    <h4 class="display-6 mt-3 mb-4 text-center">{{ $student->user->name }}</h4>
                    <hr>
                    <div class="row">
                        <!-- Address Column -->
                        <div class="col-12 col-md-4">
                            <h4 class="my-4">@lang('profile')</h4>

                            <p><strong>@lang('address'):</strong> {{ $student->address }}</p>
                            <p><strong>@lang('phone'):</strong> {{ $student->phone }}</p>
                            <p><strong>@lang('email'):</strong> {{ $student->user->email }}</p>
                            <p><strong>@lang('age'):</strong> {{ \Carbon\Carbon::parse($student->birthday)->age }}</p>
                            <p><strong>@lang('city'):</strong> {{ $student->city ? $student->city->name : 'N/A' }}</p>
                            @if(Auth::user() && Auth::user()->id == $student->user_id)
                            <div class="d-flex mt-5">
                                <a href="{{ route('students.edit', $student->id)}}" class="btn btn-primary me-2">@lang('modify')</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    @lang('delete')
                                </button>
                            </div>
                            @endif
                        </div>
                        <!-- Blog Titles Column -->
                        <div class="col-12 col-md-4">
                            <h4 class="my-4">@lang('posts')</h4>
                            <ul>
                                @forelse($student->user->blogPosts as $blog)
                                <li>
                                    <a href="{{ route('blog.show', $blog->id)}}">{{ ucwords($blog->title) }}</a>
                                    <span class="text-muted">{{ $blog->date }}</span>
                                </li>
                                @empty
                                <li class="text-danger">@lang('no_post_written')</li>
                                @endforelse
                            </ul>
                            @if(Auth::user() && Auth::user()->id == $student->user_id)
                            <div class="d-flex mt-5">
                                <a href="{{route ('blog.create')}}" class="btn btn-primary me-2">@lang('add')</a>
                            </div>
                            @endif
                        </div>
                        <!-- Documents sharing -->
                        <div class="col-12 col-md-4">
                            <h4 class="my-4">@lang('documents')</h4>
                            <ul>
                                @forelse($student->user->documents as $document)
                                <li>
                                    <a href="{{ asset('storage/'. $document->doc_url) }}" target="_blank">{{ $document->title }}</a>
    
                                    <span class="text-muted">{{ $document->created_at }}</span>
                                </li>
                                @if(Auth::user() && Auth::user()->id == $document->user->id)
                                    <form method="post" action="{{ route('documents.destroy', $document->id) }}" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">x</button>
                                    </form>
                                    @endif
                                @empty
                                <li class="text-danger">@lang('no_documents')</li>
                                @endforelse                            </ul>

                        </div>
                    </div>
                </div>
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