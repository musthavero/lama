<div x-data="{addMenuPopUp:false}">
    <x-backend::modal>
        <x-slot name="controlVal">addMenuPopUp</x-slot>
        <x-slot name="hideTrigger">close-modal</x-slot>
        <x-slot name="showTrigger">show-modal</x-slot>
        <x-slot name="title">
            Add Menu
        </x-slot>
        <x-slot name="content">
            <livewire:menus::add-menu-form/>
        </x-slot>
    </x-backend::modal>
    <div class="flex justify-between items-center border-b-2 border-blue-300 mb-3 font-bold font-custom text-2xl text-gray-800">
        <div class="">
        </div>
        <div class="">
            <button type="button" class="bg-green-500 p-2 m-1 px-4 text-white shadow font-custom text-base"
                    @click="addMenuPopUp = true;">
                add menu
            </button>
        </div>
    </div>
    @if ($menus->count())
        <div class=" mx-auto w-full flex flex-col space-y-4 justify-center items-center">
            @each('menus::components.one-menu',$menus,'item')
        </div>
    @endif
</div>
