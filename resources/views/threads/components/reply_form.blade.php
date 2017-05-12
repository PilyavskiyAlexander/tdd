<form action="{{route('thread_repliers', $thread->id)}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <textarea name="body" id="body" class="form-control" placeholder="{{trans_choice('main.comment', 1)}}" rows 5></textarea>
    </div>
    <div class="col-xs-6 col-xs-offset-3">
        <button type="submit" class="btn btn-success btn-block">@lang('main.send')</button>
    </div>
</form>