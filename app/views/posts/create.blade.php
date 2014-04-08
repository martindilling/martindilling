@extends('layouts.admin')

@section('content')

	<h1>Create Post</h1>

	{{ Form::open(array('route' => 'posts.store', 'class' => 'form-horizontal', 'role' => 'form')) }}

		@include('posts._form')

	{{ Form::close() }}

@stop


