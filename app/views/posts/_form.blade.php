<div class="row">
	<div class="col-md-12">

		<div class="form-group {{ set_error('title', $errors) }}">
			<label for="title" class="col-sm-2 col-md-2 control-label">
				Title:* <span class="glyphicon glyphicon-info-sign help-tip" title="short and precise title"></span>
			</label>
			<div class="col-sm-8 col-md-8">
				{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'My First Post')) }}
				{{ get_error('title', $errors) }}
			</div>
		</div>

		<div class="form-group {{ set_error('slug', $errors) }}">
			<label for="slug" class="col-sm-2 col-md-2 control-label">
				Slug:* <span class="glyphicon glyphicon-info-sign help-tip" title="alpha-num-dash version of the title"></span>
			</label>
			<div class="col-sm-8 col-md-8">
				<div class="input-group">
					<span class="input-group-addon">{{ $routeUri }}</span>
					{{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'my-first-post')) }}
				</div>
				{{ get_error('slug', $errors) }}
			</div>
		</div>

		<div class="form-group {{ set_error('publish_at', $errors) }}">
			<label for="publish_at" class="col-sm-2 col-md-2 control-label">
				Publish:* <span class="glyphicon glyphicon-info-sign help-tip" title="when should the post be available"></span>
			</label>
			<div class="col-sm-8 col-md-8">
				{{ Form::text('publish_at', null, array('id' => 'publishDate', 'class' => 'form-control', 'data-date-format' => 'YYYY-MM-DD H:mm:ss')) }}
				{{ get_error('publish_at', $errors) }}
			</div>
		</div>

		<div class="form-group {{ set_error('summary', $errors) }}">
			<label for="preview" class="col-sm-2 col-md-2 control-label">
				Summary: <span class="glyphicon glyphicon-info-sign help-tip" title="short resume of the post"></span>
			</label>
			<div class="col-sm-8 col-md-8">
				{{ Form::textarea('summary', null, array('class' => 'form-control', 'placeholder' => 'Short summary', 'rows' => 3)) }}
				{{ get_error('summary', $errors) }}
			</div>
		</div>

		<div class="form-group {{ set_error('body', $errors) }}">
			<label for="body" class="col-sm-2 col-md-2 control-label">
				Body:* <span class="glyphicon glyphicon-info-sign help-tip" title="post text in markdown"></span>
			</label>
			<div class="col-sm-8 col-md-8">
				{{ Form::textarea('body', null, array('id' => 'mdbody', 'class' => 'form-control', 'placeholder' => 'Body', 'rows' => 8)) }}
				{{ get_error('body', $errors) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Post', array('class' => 'btn btn-info')) }}
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-12 text">
				<section id="mdpreview" class="entry-content"></section>
			</div>
		</div>

	</div>
</div>
