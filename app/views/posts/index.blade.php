@extends('layouts.master')

@section('title', 'Blog')

@section('content')

    @if ($posts->count())
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-12 listitem post {{ $post->present()->publicClass }}">
                    @if ($userData->isAdmin || $userData->id == $post->user_id)
                        <a href="{{ route('posts.edit', array('id' => $post->id)) }}" class="admin-creation-action">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="{{ route('posts.destroy', array('id' => $post->id)) }}" class="admin-creation-action" data-method="delete" data-confirm="Are you sure?">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    @endif
                    <a href="{{ route('posts.show', array('id' => $post->id, 'slug' => $post->slug)) }}#disqus_thread" data-disqus-identifier="{{ URL::route('posts.showid', array('id' => $post->id), false) }}">Link</a>
                    <a href="{{ route('posts.show', array('id' => $post->id, 'slug' => $post->slug)) }}">
                        <div class="meta">
                            <span class="title">{{ $post->title }}</span>
                            <span class="date hidden-xs">{{ $post->present()->publishDate }}</span>
                            <span class="type hidden-xs">{{ $post->present()->published }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="pagination-center">
            {{ $pagination }}
        </div>
    @else
        There are no posts
    @endif

@stop
