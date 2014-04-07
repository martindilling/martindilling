@if ($errors->any() || Session::has('error') || Session::has('success') || Session::has('info') || Session::has('warning'))

	<div class="alerts">

		@if ($errors->any())
			<div class="alert alert-dismissable alert-danger">
				<button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
				<strong>{{ Session::has('flashhead') ? Session::get('flashhead') : 'Validation errors :(' }}</strong>
				@if ($errors->any())
					@foreach ($errors->all('<li>:message</li>') as $message)
						{{ $message }}
					@endforeach
				@endif
			</div>
		@endif

		@if (Session::has('error'))
			<div class="alert alert-dismissable alert-danger">
				<button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
				<strong>{{ Session::has('flashhead') ? Session::get('flashhead') : 'Error :(' }}</strong>
				@if (is_array(Session::get('error')))
					<ul>
						@foreach (Session::get('error') as $message)
							<li>{{ $message }}</li>
						@endforeach
					</ul>
				@else
					<p>{{ Session::get('error') }}</p>
				@endif
			</div>
		@endif

		@if (Session::has('warning'))
			<div class="alert alert-dismissable alert-warning">
				<button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
				<strong>{{ Session::has('flashhead') ? Session::get('flashhead') : 'Warning :/' }}</strong>
				@if (is_array(Session::get('warning')))
					<ul>
						@foreach (Session::get('warning') as $message)
							<li>{{ $message }}</li>
						@endforeach
					</ul>
				@else
					<p>{{ Session::get('warning') }}</p>
				@endif
			</div>
		@endif

		@if (Session::has('info'))
			<div class="alert alert-dismissable alert-info">
				<button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
				<strong>{{ Session::has('flashhead') ? Session::get('flashhead') : 'Info O.O' }}</strong>
				@if (is_array(Session::get('info')))
					<ul>
						@foreach (Session::get('info') as $message)
							<li>{{ $message }}</li>
						@endforeach
					</ul>
				@else
					<p>{{ Session::get('info') }}</p>
				@endif
			</div>
		@endif

		@if (Session::has('success'))
			<div class="alert alert-dismissable alert-success">
				<button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
				<strong>{{ Session::has('flashhead') ? Session::get('flashhead') : 'Success :D' }}</strong>
				@if (is_array(Session::get('success')))
					<ul>
						@foreach (Session::get('success') as $message)
							<li>{{ $message }}</li>
						@endforeach
					</ul>
				@else
					<p>{{ Session::get('success') }}</p>
				@endif
			</div>
		@endif

	</div>

@endif
