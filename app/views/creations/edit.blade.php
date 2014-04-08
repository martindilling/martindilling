@extends('layouts.admin')

@section('content')

	<h1>Edit Creation</h1>

	{{ Form::model($creation, array('route' => array('creations.update', $creation->id), 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}

			@include('creations._form')

	{{ Form::close() }}

@stop
