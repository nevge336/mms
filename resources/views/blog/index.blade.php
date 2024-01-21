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
            <div class="card-header font-bruno">
                <h1>Forum</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($blogs as $blog)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <a href="{{ route('blog.show', $blog->id)}}" class="display-6 text-decoration-none">{{ ucwords($blog->title) }}</a>
                                <p>@lang('by')
                                    @if($blog->user->student)
                                    <a href="{{ route('students.show', $blog->user->student->id) }}" class="text-decoration-none">{{ $blog->user->name }}</a>                                   
                                    @else
                                    {{ $blog->user->name }}
                                    @endif
                                </p>
                                <p>{{ Str::words($blog->content, 25) }}</p>
                                <small>@lang('published'): {{ $blog->date }}</small>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-danger">@lang('no_post_written')</p>
                    @endforelse
                </div>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection