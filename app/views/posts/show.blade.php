@extends('layouts.master')

@section('title', $post->title)
@section('description', Str::limit(trim(preg_replace('/\r\n+|\r+|\n+/', '. ', strip_tags($post->present()->markdownBody))), 150))
@section('fb_og_type', 'article')

@section('disqus_enabled',     true)
@section('disqus_identifier',  URL::route('posts.showid', array('id' => $post->id), false))
@section('disqus_url',         URL::route('posts.showid', array('id' => $post->id), true))
@section('disqus_category_id', Config::get('disqus.category.post'))

@section('meta_facebook')
    <meta property="article:author" content="{{ Config::get('meta.fb.article.author') }}" />
    <meta property="article:section" content="{{ Config::get('meta.fb.article.section.post') }}" />
@stop


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
        <div class="col-md-12 sharing">
            <div class="fb-like" data-href="{{ route('posts.showid', array('id' => $post->id)) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
            <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text">
            <section class="entry-content">
                {{ $post->present()->markdownBody }}
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="comments-block">
                @include('layouts.partials.disquscomments')
            </div>
        </div>
    </div>

@stop
