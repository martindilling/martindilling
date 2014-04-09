@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12 headerimg {{ $post->present()->publicClass }}">
            @if ($userData->isAdmin || $userData->id == $post->user_id)
                <a href="{{ route('posts.edit', array('id' => $post->id)) }}" class="admin-creation-action">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="{{ route('posts.destroy', array('id' => $post->id)) }}" class="admin-creation-action" data-method="delete" data-confirm="Are you sure?">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            @endif
            <div class="head">
                <div class="meta">
                    <span class="title">{{ $post->title }}</span>
                    <span class="date hidden-xs">{{ $post->present()->publishDate }}</span>
                    <span class="type hidden-xs">{{ $post->present()->published }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text">
            <section class="entry-content">
                {{ $post->present()->markdownBody }}
            </section>
        </div>
    </div>

@stop
