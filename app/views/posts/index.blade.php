@extends('layouts.master')

@section('content')

@if ($posts->count())
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-12 listitem post">
        <a href="{{ route('posts.show', array('id' => $post->id, 'slug' => $post->slug)) }}">
            <div class="meta">
                <span class="title">{{ $post->title }}</span>
                <span class="date hidden-xs">{{ $post->publish_at }}</span>
                <span class="type hidden-xs">{{-- $post->user->getFullName() --}}</span>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="pagination-center">
    {{ $posts->links() }}
</div>
@else
There are no posts
@endif

@stop
