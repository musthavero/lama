<div x-data="{addMenuItemFormShow: false }" class="w-full space-y-4" id="listWithHandle" wire:key="listWithHandle">
    <x-backend::modal>
        <x-slot name="controlVal">addMenuItemFormShow</x-slot>
        <x-slot name="hideTrigger">close-menu-item-modal</x-slot>
        <x-slot name="showTrigger">open-menu-item-modal</x-slot>
        <x-slot name="title">
            Add Menu Item
        </x-slot>
        <x-slot name="content">
            <livewire:menus::add-menu-item-form :activeMenu="$activeMenu" key="{{ Str::random() }}"/>
        </x-slot>
    </x-backend::modal>
    <div
        class="flex justify-between items-center border-b-2 border-blue-300 mb-3 font-bold font-custom text-2xl text-gray-800">
        <div class="">
            {{$theMenu->name}}
        </div>
        <div class="">
            <button type="button" class="bg-green-500 p-2 m-1 px-4 text-white shadow font-custom text-base"
                    @click="Livewire.emit('add-selected')">
                add menu item
            </button>
        </div>
    </div>
    @if ($menus->count())
        <div class="mx-auto flex flex-col space-y-2 justify-center items-center sortable-group" id="master-list">
            @each('menus::components.one-menu-item',$menus,'item')
        </div>
    @endif
</div>

<script>
    let sortables = [];
    const options = {
        group: {name: 'menus'},
        handle: '.move',
        emptyInsertThreshold: 5,
        animation: 100,
        easing: "cubic-bezier(1, 0, 0, 1)",
        draggable: '.sortable-item',
        onEnd: (evt) => showData(evt),
    }

    function showData(evt) {
        Livewire.emitTo('menus::menu-items-list', 'changed-position', [evt.to.id, evt.item.id, evt.newIndex])
    }

    window.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.sortable-group').forEach(el => {
                sortables.push(Sortable.create(el, options))
            }
        )
    });
    window.addEventListener('menu-items-list-refreshed', event => {
        sortables.forEach(element => element.destroy())
        sortables = []
        document.querySelectorAll('.sortable-group').forEach(el => {
                sortables.push(Sortable.create(el, options))
            }
        )
    });
</script>
