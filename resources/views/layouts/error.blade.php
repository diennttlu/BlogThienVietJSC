@if( isset($message_error) )
    <div class="alert alert-danger">
        {{ $message_error }}
    </div>
@endif
@if( count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $err )
            {{ $err }}<br>
        @endforeach
    </div>
@endif
