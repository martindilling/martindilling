@extends('layouts.admin')

@section('styles')
@stop

@section('content')

	<h1>Create Creation</h1>

	{{ Form::open(array('route' => 'creations.store', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}

		@include('creations._form')

	{{ Form::close() }}

@stop


