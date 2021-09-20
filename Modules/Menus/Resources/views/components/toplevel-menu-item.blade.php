<div class="relative m-2
                 @if (isset($item->parent))
    block w-full
@else
    inline-block
@endif
">
    <x-menus::menu-dropdown>
        <x-slot name="trigger">
            <div class="px-2 py-1 text-sm w-full" style="width: max-content">

            <a href="{{$app['url']->to('/').'/'.$item['url']}}"
                   class="{{ (request()->is($item['url'].'*')) ? ' bg-red-500 text-white font-bold ' : ' text-gray-700 font-medium '  }}
                       transition-colors p-2 duration-200 transform hover:bg-gray-300 ">
                    {{$item['name']}}
                </a>
            </div>
        </x-slot>
        <x-slot name="slot">
            @if (count($item['children']))
                <div class="absolute bg-white p-3 rounded shadow-lg z-50">
                    @each('menus::components.toplevel-menu-item',$item['children'],'item')
                </div>
            @endif
        </x-slot>
    </x-menus::menu-dropdown>
</div>
