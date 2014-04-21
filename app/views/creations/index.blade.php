@extends('layouts.master')

@section('title', 'Portfolio')

@section('content')

    @if ($creations->count())
        @foreach (array_chunk($creations->all(), 2) as $row)
            <div class="row">
                @foreach ($row as $creation)
                    <div class="col-md-6 listitem {{ $creation->present()->publicClass }}">
                        @if ($userData->isAdmin || $userData->id == $creation->user_id)
                            <a href="{{ route('creations.edit', array('id' => $creation->id)) }}" class="admin-creation-action">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="{{ route('creations.destroy', array('id' => $creation->id)) }}" class="admin-creation-action" data-method="delete" data-confirm="Are you sure?">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        @endif
                        <a href="{{ route('creations.show', array('id' => $creation->id, 'slug' => $creation->slug)) }}">
                            <div class="meta">
                                <span class="title">{{ $creation->title }}</span>
                                <span class="date hidden-xs">{{ $creation->present()->publishDate }}</span>
                                <span class="type hidden-xs">{{ $creation->present()->published }}</span>
                            </div>
                            <img src="{{ asset($creation->present()->thumbUrl) }}" class="img-responsive" alt="{{ $creation->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
        
        <div class="pagination-center">
            {{ $pagination }}
        </div>
    @else
        There are no creations
    @endif

@stop
