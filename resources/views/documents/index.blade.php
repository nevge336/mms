@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-4">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="d-flex justify-content-between card-header font-bruno align-items-center">
                <h1>@lang('documents_sharing')</h1>
                <a href="{{ route('documents.create') }}" class="btn btn-primary">@lang('upload_document')</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($documents as $document)
                    <div class="col-12 col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div>
                                    <h2>{{ $document->title }}</h2>
                                    <a href="{{ route('students.show', $document->user->student->id) }}" class="text-decoration-none">{{ $document->user->name }}</a>
                                    <p>Type: {{ pathinfo($document->doc_url, PATHINFO_EXTENSION) }}</p>
                                    <p>Date: {{ $document->created_at->format('d-m-Y') }}</p>
                                    <a href="{{ asset('storage/' . $document->doc_url) }}" target="_blank">@lang('view_document')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-danger">@lang('no_document_shared')</p>
                    @endforelse
                </div>
                <!-- Display the pagination links -->
                {{ $documents->links() }}
            </div>
        </div>
    </div>
</div>
@endsection