<div class="w-full max-w-full space-y-2" id="{{$item->id}}">
    <div class="bg-white w-full max-w-full flex items-center p-2 border-t border-b hover:shadow-lg transition transition-shadow duration-200">
        <div class="flex-grow p-3">
            <div class="font-semibold text-gray-700 font-custom">{{ $item->name }}</div>
            <div class="text-ml text-gray-500 font-custom">
                @if ($item->is_visible)
                    Visible
                @else
                    <span class="text-red-500">Not Visible</span>
                @endif
            </div>
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
                        @click="if (confirm('Are you sure?')) @this.deleteType({{$item->id}})"
                        wire:key="delbtn_{{$item->id}}">
                @include('backend::utilities.delete-icon')
            </div>
        </div>
    </div>
</div>
