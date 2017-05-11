<div class="panel panel-default">
    <div class="panel-heading">{{ $title }}</div>
    <div class="panel-body">
        @foreach($items as $item)
            <artical>
                <h4>
                    <a href="{{route($route_name, $item->id)}}">
                        {{$item->title}}
                    </a>
                </h4>
                <div class="body">{{$item->body}}</div>
            </artical>
            <hr>
        @endforeach
    </div>
</div>