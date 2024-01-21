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
                <ul>
                    @forelse($blogs as $blog)
                    <li><a href="{{ route('blog.show', $blog->id)}}">{{ $blog->title }}</a></li>
                    @empty
                    <li class="text-danger">@lang('no_post_written')</li>
                    @endforelse
                </ul>
                
            </div>
        </div>
    </div>

</div>
@endsection