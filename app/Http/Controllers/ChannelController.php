<?php

namespace App\Http\Controllers;

use App\Channel;
use App\User;
use Illuminate\Http\Request;

class ChannelController extends Controller
{

    public function show(Request $request)
    {
        $channel = Channel::where('name', $request->channel)->first();
        return view('channel.show', compact('channel'));
    }
}
