@extends('layouts.layout')
@section('content')
<div class="d-flex row">
    <div class="col-8 align-items-center">

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="card col-12 col-md-6 d-flex">
            @csrf
            <div class="card-body ">
                <div class="control-group col-12 ">
                    <label for="title">@lang('title_english')</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="control-group col-12">
                    <label for="title_fr">@lang('title_french')</label>
                    <input type="text" id="title_fr" name="title_fr" class="form-control" required>
                </div>
                <div class="control-group col-12">
                    <label for="document">@lang('document')</label>
                    <input type="file" id="document" name="document" class="form-control" required>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-warning btn-lg mt-3">@lang('upload')</button>
            </div>
        </form>
    </div>
</div>
@endsection