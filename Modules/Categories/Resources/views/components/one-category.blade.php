<div class="w-full max-w-full space-y-2 sortable-item" sortable-item id="{{$item->id}}">
    <div
        class="bg-white w-full max-w-full flex items-center p-2 border-t border-b hover:shadow-lg transition transition-shadow duration-200">
        @include('backend::utilities.move-icon')
        <div class="flex-grow p-3">
            <div class="font-semibold text-ml text-gray-700 font-custom">{{ $item->name }}
{{--                ({{count($item->products)}} products)--}}
            </div>
            <div class="text-ml text-gray-500 font-custom">{{ $item->url }}</div>
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
                        @click="if (confirm('Are you sure?')) @this.deleteCategory({{$item->id}})"
                        wire:key="delbtn_{{$item->id}}">
                    @include('backend::utilities.delete-icon')
                </button>
            </div>
        </div>
    </div>
    <div class="w-11/12 ml-auto space-y-2 sortable-group-children pt-2" id="c-{{$item->id}}">
        @if (count($item->children))
            @each('categories::components.one-category',$item->children,'item')
        @endif
        <script>
            let sortables_{{$item->id}} = [];
            const options_{{$item->id}} = {
                group: {name: 'sub_categories_{{$item->id}}'},
                handle: '.move',
                emptyInsertThreshold: 5,
                animation: 100,
                easing: "cubic-bezier(1, 0, 0, 1)",
                draggable: '.sortable-item',
                onEnd: (evt) => showData(evt),
            }

            window.addEventListener('DOMContentLoaded', function () {
                let el = document.getElementById('c-{{$item->id}}')
                sortables_{{$item->id}}.push(Sortable.create(el, options_{{$item->id}}))
            });
            window.addEventListener('categories-list-refreshed', event => {
                sortables_{{$item->id}}.forEach(element => element.destroy())
                sortables_{{$item->id}} = []
                let el = document.getElementById('c-{{$item->id}}')
                sortables_{{$item->id}}.push(Sortable.create(el, options_{{$item->id}}))
            });
        </script>
    </div>
</div>
