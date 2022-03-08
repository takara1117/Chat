@extends('layouts.app')

@section('content')
    <a href="http://localhost:8000/"><img src="{{ asset('/images/back.png') }}" alt="" width="50px" height="50px"></a>

    {{-- @if (Auth::user()->id !== 1) 
        <div class="text-5xl text-center">
            {{$user_1->name}}
        </div>
    @else
        <div class="text-5xl text-center">
            {{$user_2->name}}
        </div>
    @endif --}}
    <div class="w-max md:w-3/5 m-auto">
        <div id="app" class="bg-indigo-300 rounded">
            <chat-component v-bind:auth="{{Auth::user()->id}}"></chat-component>
        </div> 
    </div>
@endsection