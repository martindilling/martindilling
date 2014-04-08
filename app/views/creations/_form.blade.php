<div class="row">
    <div class="col-md-12">

        <div class="form-group {{ set_error('title', $errors) }}">
            <label for="title" class="col-sm-2 col-md-2 control-label">
                Title:* <span class="glyphicon glyphicon-info-sign help-tip" title="short and precise title"></span>
            </label>
            <div class="col-sm-8 col-md-8">
                {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'My First Creation')) }}
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
                    {{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'my-first-creation')) }}
                </div>
                {{ get_error('slug', $errors) }}
            </div>
        </div>

        <div class="form-group {{ set_error('weblink', $errors) }}">
            <label for="weblink" class="col-sm-2 col-md-2 control-label">
                Weblink: <span class="glyphicon glyphicon-info-sign help-tip" title="link to demo or relevant information"></span>
            </label>
            <div class="col-sm-8 col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">http://</span>
                    {{ Form::text('weblink', null, array('class' => 'form-control', 'placeholder' => 'example.com')) }}
                </div>
                {{ get_error('weblink', $errors) }}
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

        <div class="form-group {{ set_error('thumb', $errors) }}">
            <label for="thumb" class="col-sm-2 col-md-2 control-label">
                Thumbnail:* <span class="glyphicon glyphicon-info-sign help-tip" title="must be 728x310"></span>
            </label>
            <div class="col-sm-8 col-md-8">
                <div class="fileinput {{ $editing ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 338px; height: 150px;">
                        <img src="http://placehold.it/352x150&text=728x310" alt="Placeholder">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 338px; max-height: 150px;">
                        @if ($editing)
                            <img src="{{ asset($creation->present()->thumbUrl) }}" alt="">
                        @endif
                    </div>
                    <div>
                        <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            {{ Form::file('thumb') }}
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
                {{ get_error('thumb', $errors) }}
            </div>
        </div>

        <div class="form-group {{ set_error('image', $errors) }}">
            <label for="image" class="col-sm-2 col-md-2 control-label">
                Image:* <span class="glyphicon glyphicon-info-sign help-tip" title="must be 1200x511"></span>
            </label>
            <div class="col-sm-8 col-md-8">
                <div class="fileinput {{ $editing ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 338px; height: 150px;">
                        <img src="http://placehold.it/352x150&text=1200x511" alt="Placeholder">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 338px; max-height: 150px;">
                        @if ($editing)
                            <img src="{{ asset($creation->present()->imageUrl) }}" alt="">
                        @endif
                    </div>
                    <div>
                        <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            {{ Form::file('image') }}
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
                {{ get_error('image', $errors) }}
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
