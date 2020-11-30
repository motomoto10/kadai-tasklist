{!! Form::open(['route' => 'tasks.store']) !!}
    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::textarea('status',old('status'), ['class' => 'form-control', 'rows' => '1']) !!}
    </div>
    <div class="form-group"> 
        {!! Form::label('content', 'Task') !!}
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '1']) !!}
    </div>
    <div class="form-group"> 
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}