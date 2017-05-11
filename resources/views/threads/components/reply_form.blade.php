<form action="{{route('thread_repliers', $thread->id)}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <textarea name="body" id="body" class="form-control" placeholder="{{trans_choice('main.comment', 1)}}" rows 5></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">@lang('main.send')</button>
    </div>
</form>