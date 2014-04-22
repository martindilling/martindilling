@extends('layouts.master')

@section('title', $creation->title)
@section('description', Str::limit(trim(preg_replace('/\r\n+|\r+|\n+/', '. ', strip_tags($creation->present()->markdownBody))), 150))
@section('image', asset($creation->present()->imageUrl))
@section('fb_og_type', 'article')

@section('disqus_enabled',     true)
@section('disqus_identifier',  URL::route('creations.showid', array('id' => $creation->id), false))
@section('disqus_url',         URL::route('creations.showid', array('id' => $creation->id), true))
@section('disqus_category_id', Config::get('disqus.category.creation'))

@section('meta_facebook')
    <meta property="article:author" content="{{ Config::get('meta.fb.article.author') }}" />
    <meta property="article:section" content="{{ Config::get('meta.fb.article.section.creation') }}" />
@stop

@section('content')

    <div class="row">
        <div class="col-md-12 headerimg {{ $creation->present()->publicClass }}">
            @if ($userData->isAdmin || $userData->id == $creation->user_id)
                <a href="{{ route('creations.edit', array('id' => $creation->id)) }}" class="admin-creation-action">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="{{ route('creations.destroy', array('id' => $creation->id)) }}" class="admin-creation-action" data-method="delete" data-confirm="Are you sure?">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            @endif
            <div class="head">
                <div class="meta">
                    <span class="title">{{ $creation->title }}</span>
                    <span class="date hidden-xs">{{ $creation->present()->publishDate }}</span>
                    <span class="type hidden-xs">{{ $creation->present()->published }}</span>
                </div>
                <img src="{{ asset($creation->present()->imageUrl) }}" class="img-responsive" alt="{{ $creation->title }}">
            </div>
            @if ($creation->weblink)
                <div class="details">
                    <a href="{{ $creation->weblink }}" class="weblink">{{ $creation->weblink }}</a>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 sharing">
            <div class="fb-like" data-href="{{ route('creations.showid', array('id' => $creation->id)) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
            <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text">
            <section class="entry-content">
                {{ $creation->present()->markdownBody }}
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 comments-block">
            @include('layouts.partials.disquscomments')
        </div>
    </div>

@stop
