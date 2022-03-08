@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card h-96"> --}}
                <div class="text-center bg-indigo-300">
                    @if (Auth::user()->id !== 1) 
                        <div class="flex justify-center text-2xl">
                            <a href="chat/chat"><img src="{{ asset('/images/user.png') }}" alt="" width="30px" height="30px"></a>
                            <a href="chat/chat" class="ml-1 text-black">{{$user_1->name}}</a>
                        </div>
                    @else
                         <div class="flex justify-center text-2xl">
                            <a href="chat/chat"><img src="{{ asset('/images/user.png') }}" alt="" width="30px" height="30px"></a>
                            <a href="chat/chat" class="ml-1 text-black">{{$user_2->name}}</a>
                        </div>
                    @endif
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
