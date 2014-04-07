@extends('layouts.master')

@section('content')

    @if ($creations->count())
        <div class="row">
            @foreach ($creations as $creation)
                <div class="col-md-6 listitem">
                    <a href="{{ route('creations.show', array('id' => $creation->id, 'slug' => $creation->slug)) }}">
                        <div class="meta">
                            <span class="title">{{ $creation->title }}</span>
                            <span class="date hidden-xs">{{ $creation->present()->publishDate }}</span>
                            <span class="type hidden-xs">{{-- $creation->type --}}</span>
                        </div>
                        <img src="{{ asset($creation->present()->thumbUrl) }}" class="img-responsive" alt="{{ $creation->title }}">
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="pagination-center">
            {{ $creations->links() }}
        </div>
    @else
        There are no creations
    @endif

@stop
