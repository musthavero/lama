@extends('backend::layouts.master')

@section('content')
    <div class="flex-1 md:flex md:items-center md:justify-between">
        <div class="relative">
            @each('menus::components.toplevel-menu-item',$menus,'item')
        </div>
    </div>

    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('backend.name') !!}
    </p>
@endsection
