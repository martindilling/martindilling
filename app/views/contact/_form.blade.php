{{ Form::open(array('route' => 'contact.sendmail', 'class' => 'form-horizontal', 'role' => 'form')) }}

    <div class="form-group {{ set_error('name', $errors) }}">
        {{ Form::label('name', 'Name:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
        <div class="col-sm-8 col-md-8">
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            {{ get_error('name', $errors) }}
        </div>
    </div>
    
    <div class="form-group {{ set_error('email', $errors) }}">
        {{ Form::label('email', 'Email:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
        <div class="col-sm-8 col-md-8">
            {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
            {{ get_error('email', $errors) }}
        </div>
    </div>
    
    <div class="form-group {{ set_error('subject', $errors) }}">
        {{ Form::label('subject', 'Subject:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
        <div class="col-sm-8 col-md-8">
            {{ Form::text('subject', null, array('class' => 'form-control', 'placeholder' => 'Subject')) }}
            {{ get_error('subject', $errors) }}
        </div>
    </div>
    
    <div class="form-group {{ set_error('body', $errors) }}">
        {{ Form::label('body', 'Message:', array('class' => 'col-sm-2 col-md-2 control-label')) }}
        <div class="col-sm-8 col-md-8">
            {{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '4', 'placeholder' => 'Message')) }}
            {{ get_error('body', $errors) }}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
            <label>
                {{ Form::checkbox('copy', true, true) }}
                Receive a copy of the email to your inbox
            </label>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
            {{ Form::submit('Send mail', array('class' => 'btn btn-block btn-primary')) }}
        </div>
    </div>

{{ Form::close() }}
