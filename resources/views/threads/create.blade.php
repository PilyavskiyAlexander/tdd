@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('Create a new thread')
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('create_thread') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="channel_id">@lang('main.channel'):</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">@lang('main.title'):</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="body">@lang('main.body'):</label>
                                <textarea name="body" id="body" rows="10" class="form-control" required>{{old('body')}}</textarea>
                            </div>
                            <div class="col-xs-6 col-xs-offset-3">
                                <button type="submit" class="btn btn-success btn-block">@lang('main.create')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection