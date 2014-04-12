@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-md-12 headertitle">
			<div class="head">
				<div class="meta">
					<span class="title">Contact</span>
					<div class="social">
						<a href="mailto:martindilling@gmail.com" target="_blank" alt="Email" title="Email">
							<i class="icon email"></i>
						</a>
						<a href="http://www.linkedin.com/in/martindilling" target="_blank" title="Linkedin" alt="Linkedin">
							<i class="icon linkedin"></i>
						</a>
						<a href="https://twitter.com/dillinghansen" target="_blank" alt="Twitter" title="Twitter">
							<i class="icon twitter"></i>
						</a>
						<a href="https://www.facebook.com/dillinghansen" target="_blank" title="Facebook" alt="Facebook">
							<i class="icon facebook"></i>
						</a>
						<a href="https://github.com/martindilling" target="_blank" alt="GitHub" title="GitHub">
							<i class="icon github"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text">
			{{ Form::open(array('url' => 'contactform', 'class' => 'form-horizontal', 'role' => 'form')) }}

				<div class="form-group">
					{{ Form::label('name', 'Name:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
					<div class="col-sm-8 col-md-8">
						{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('email', 'Email:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
					<div class="col-sm-8 col-md-8">
						{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('subject', 'Subject:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
					<div class="col-sm-8 col-md-8">
						{{ Form::text('subject', null, array('class' => 'form-control', 'placeholder' => 'Subject')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('body', 'Message:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
					<div class="col-sm-8 col-md-8">
						{{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '4', 'placeholder' => 'Message')) }}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
						{{ Form::submit('Send mail', array('class' => 'btn btn-block btn-primary')) }}
					</div>
				</div>

			{{ Form::close() }}

		</div>
	</div>

@stop
