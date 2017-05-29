@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            @component('threads.components.panel',
                      ['title' => trans_choice('main.channel', 1) .' '. $channel->name, 'items' => $channel->threads, 'route_name' => 'show_thread'])
            @endcomponent
        </div>
    </div>
@endsection