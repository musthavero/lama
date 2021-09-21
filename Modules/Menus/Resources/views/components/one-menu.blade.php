<div class="w-full max-w-full space-y-2 flex" wire:key="{{$item->id}}">
    <div
        class="bg-white w-full max-w-full flex items-center p-2 border-t border-b hover:shadow-lg transition transition-shadow duration-200">
        <div class="flex-grow p-3">
            <div class="font-semibold text-gray-700 font-custom">{{ $item->name }}</div>
        </div>
        <div class="p-2">
            <div x-data class="inline">
                <button wire:click="selectMenu({{ $item->id }}, 'update')">
                    @include('backend::utilities.edit-icon')
                </button>
            </div>
            <div x-data class="inline">
                <button
                    @click="if (confirm('Are you sure?')) @this.deleteMenu({{$item->id}})"
                    wire:key="delbtn_{{$item->id}}">
                    @include('backend::utilities.delete-icon')
                </button>
            </div>
        </div>
    </div>
</div>
