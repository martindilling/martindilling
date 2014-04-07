@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12 headerimg">
            <div class="head">
                <div class="meta">
                    <span class="title">{{ $creation->title }}</span>
                    <span class="date hidden-xs">{{ $creation->present()->publishDate }}</span>
                    <span class="type hidden-xs">{{-- $creation->type --}}</span>
                </div>
                <img src="{{ asset($creation->present()->imageUrl) }}" class="img-responsive" alt="{{ $creation->title }}">
            </div>
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
