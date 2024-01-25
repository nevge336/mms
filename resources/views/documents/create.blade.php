@extends('layouts.layout')
@section('content')
<div class="d-flex row">
    <div class="col-8 align-items-center">

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="card col-12 col-md-6 d-flex">
            @csrf
            <div class="card-body ">
                <div class="control-group col-12 ">
                    <label for="doc_title">@lang('title_english')</label>
                    <input type="text" id="doc_title" name="doc_title" class="form-control">
                    @if($errors->has('doc_title'))
                    <div class="alert alert-warning">
                        {{ $errors->first('doc_title') }}
                    </div>
                    @endif
                </div>
                <div class="control-group col-12">
                    <label for="doc_title_fr">@lang('title_french')</label>
                    <input type="text" id="doc_title_fr" name="doc_title_fr" class="form-control">
                    @if($errors->has('doc_title_fr'))
                    <div class="alert alert-warning">
                        {{ $errors->first('doc_title_fr') }}
                    </div>
                    @endif
                </div>
                <div class="control-group col-12">
                    <label for="document">@lang('document_upload')</label>
                    <input type="file" id="document" name="document" class="form-control">
                    @if($errors->has('document'))
                    <div class="alert alert-warning">
                        {{ $errors->first('document') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-warning btn-lg mt-3">@lang('upload')</button>
            </div>
        </form>
    </div>
</div>
@endsection