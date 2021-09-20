@extends('frontend::layouts.master')

@section('content')
    <div class="container flex flex-grow mx-auto border justify-center">
        <div class="justify-center bg-yellow-300 border">
            <h1>Hello World</h1>
            <p>
                This view is loaded from module: <span class="font-bold">{!! config('frontend.name') !!}</span>
            </p>
        </div>
    </div>

@endsection
