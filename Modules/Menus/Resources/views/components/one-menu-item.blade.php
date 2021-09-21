<div class="w-full max-w-full space-y-2 sortable-item" sortable-item id="{{$item->id}} ">
    <div class="bg-white w-full max-w-full flex items-center p-2 border-t border-b hover:shadow-lg transition transition-shadow duration-200">
        @include('backend::utilities.move-icon')
        <div class="flex-grow p-3">
            <div class="font-semibold text-gray-700 font-custom">{{ $item->name }}</div>
            <div class="text-sm text-gray-500 font-custom">{{ $item->url }}</div>
        </div>
        <div class="p-2">
            <button
                @click="Livewire.emit('change-selected', {{$item->id}})"
                wire:loading.class="bg-gray-200"
                wire:loading.class.remove="bg-blue-200"
                wire:loading.attr="disabled">
                @include('backend::utilities.edit-icon')
            </button>
            <div x-data class="inline">
                <button class=""
                        @click="if (confirm('Are you sure?')) @this.deleteMenuItem({{$item->id}})"
                        wire:key="delbtn_{{$item->id}}">
                    @include('backend::utilities.delete-icon')
                </button>
            </div>
        </div>
    </div>
    <div class="w-11/12 ml-auto space-y-2 sortable-group" id="c-{{$item->id}}">
        @if (count($item->children))
            @each('menus::components.one-menu-item',$item->children,'item')
        @endif
    </div>
</div>
