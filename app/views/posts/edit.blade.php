@extends('layouts.admin')

@section('content')

	<h1>Edit Post</h1>

	{{ Form::model($post, array('route' => array('posts.update', $post->id), 'class' => 'form-horizontal', 'role' => 'form')) }}

		@include('posts._form')

	{{ Form::close() }}

@stop
