<div x-data="{addCategoryPopUp:false}" class="w-full space-y-4" id="listWithHandle" wire:key="listWithHandle">
    <x-backend::modal>
        <x-slot name="controlVal">addCategoryPopUp</x-slot>
        <x-slot name="hideTrigger">close-category-modal</x-slot>
        <x-slot name="showTrigger">show-category-modal</x-slot>
        <x-slot name="title">
            Add Category
        </x-slot>
        <x-slot name="content">
            <livewire:categories::add-category-form/>
        </x-slot>
    </x-backend::modal>
    <div class="flex justify-between items-center border-b-2 border-blue-300 mb-3 font-bold font-custom text-2xl text-gray-800">
        <div class="">
        </div>
        <div class="">
            <button type="button" class="bg-green-500 p-2 m-1 px-4 text-white shadow font-custom text-base"
                    @click="Livewire.emit('add-selected')">
                add category
            </button>
        </div>
    </div>
    @if ($categories->count())
        <div class="mx-2 gap-y-2 gap-x-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 sortable-group" id="master-list">
            @each('categories::components.one-category',$categories,'item')
        </div>
    @endif
</div>

<script>
    let sortables = [];
    const options = {
        group: {name: 'categories'},
        handle: '.move',
        emptyInsertThreshold: 5,
        animation: 100,
        easing: "cubic-bezier(1, 0, 0, 1)",
        draggable: '.sortable-item',
        onEnd: (evt) => showData(evt),
    }

    function showData(evt) {
        Livewire.emitTo('categories::categories-manager', 'changed-position', [evt.to.id, evt.item.id, evt.newIndex])
    }

    window.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.sortable-group').forEach(el => {
                sortables.push(Sortable.create(el, options))
            }
        )
    });
    window.addEventListener('categories-list-refreshed', event => {
        sortables.forEach(element => element.destroy())
        sortables = []
        document.querySelectorAll('.sortable-group').forEach(el => {
                sortables.push(Sortable.create(el, options))
            }
        )
    });
</script>
