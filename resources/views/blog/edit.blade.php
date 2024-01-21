@extends('layouts.layout')
@section('content')
<div class="row justify-content-center mx-2">
    <h1 class="text-center my-5 font-bruno">@lang('edit_article')</h1>
    <div class="col-md-6">
        <div class="card">
            <form method="post">
                @method('put')
                @csrf
                <div class="card-header display-6 text-center">
                    English
                </div>
                <div class="card-body">
                    <div class="control-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $blogPost->title}}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="control-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" class="form-control" rows="10"> {{ $blogPost->content }}</textarea>
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header display-6 text-center">
                Français
            </div>
            <div class="card-body">
                <div class="control-group">
                    <label for="title_fr">Titre</label>
                    <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{ $blogPost->title_fr }}">
                    @error('title_fr')
                    <div class="alert alert-danger">{{ $message }}
                </div>
                @enderror
            </div>
            <div class="control-group">
                <label for="content_fr">Contenu</label>
                <textarea id="content_fr" name="content_fr" class="form-control" rows="10">{{ $blogPost->content_fr }}</textarea>
                @error('content_fr')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-center mt-3">
    <input type="submit" value="@lang('submit')" class="btn btn-warning btn-lg font-bruno">
</div>
</form>
</div>
@endsection