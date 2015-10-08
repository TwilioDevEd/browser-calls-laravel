@if (isset($messages))
    @foreach($messages as $message)
        <div class="alert alert-{{ $message->kind }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $message->content }}
        </div>
    @endforeach
@endif
