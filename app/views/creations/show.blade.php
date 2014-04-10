@extends('layouts.master')

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
        <div class="col-md-12 text">
            <section class="entry-content">
                {{ $creation->present()->markdownBody }}
            </section>
        </div>
    </div>

@stop
