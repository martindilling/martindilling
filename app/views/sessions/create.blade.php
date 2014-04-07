@extends('layouts.master')

@section('styles')
	{{ HTML::style('assets/css/signin.css') }}
@stop

@section('content')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<!-- <h1 class="text-center login-title">Sign in to continue to the Admin panel</h1> -->
			<div class="account-wall">
				<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
				alt="">
				{{ Form::open(array('route' => 'sessions.store', 'class' => 'form-signin')) }}
					{{ Form::text('email', null, array(
						'class' => 'form-control',
						'placeholder' => 'Email',
						'autofocus')) }}
					{{ Form::password('password', array(
						'class' => 'form-control',
						'placeholder' => 'Password')) }}
					{{ Form::submit('Sign in', array('class' => 'btn btn-lg btn-primary btn-block')) }}
					<label class="checkbox pull-left">
						{{ Form::checkbox('remember-me', 'false') }}
						Remember me
					</label>
					<!-- <a href="#" class="pull-right need-help">Need help? </a> -->
					<span class="clearfix"></span>
			{{ Form::close() }}
			</div>
			<!-- <a href="#" class="text-center new-account">Create an account </a> -->
			{{ link_to_route('home', 'Back to site', null, array('class' => 'text-center appended-text')) }}
		</div>
	</div>

@stop
