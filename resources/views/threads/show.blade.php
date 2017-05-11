@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$thread->title}}
                        <a href="#" class="pull-right">{{$thread->user->name}}</a>
                    </div>
                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
                <div class="row">
                    @foreach($thread->repliers as $reply)
                        @include('threads.components.reply')
                    @endforeach
                </div>
                @if(auth()->check())
                    <div class="row">
                        @include('threads.components.reply_form')
                    </div>
                @else
                    <p class="text-center"><a href="{{route('login')}}"> @lang('Please sing in to participate in this discussion') </a></p>
                @endif
            </div>
        </div>
@endsection