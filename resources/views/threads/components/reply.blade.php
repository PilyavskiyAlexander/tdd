<div class="panel panel-default">
    <div class="panel-heading">
        {{$reply->user->name}} <span class="pull-right">{{$reply->created_at->diffForHumans()}}</span>
    </div>
    <div class="panel-body">
        {{$reply->body}}
    </div>
</div>