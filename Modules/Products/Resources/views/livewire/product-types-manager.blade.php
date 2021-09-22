<div x-data="{addTypePopUp:false}" class="w-full space-y-4" id="listWithHandle" wire:key="listWithHandle">
    <x-backend::modal>
        <x-slot name="controlVal">addTypePopUp</x-slot>
        <x-slot name="hideTrigger">close-type-modal</x-slot>
        <x-slot name="showTrigger">show-type-modal</x-slot>
        <x-slot name="title">
            Add Type
        </x-slot>
        <x-slot name="content">
            <livewire:products::add-product-type-form/>
        </x-slot>
    </x-backend::modal>
    <div class="flex justify-between items-center border-b-2 border-blue-300 mb-3 font-bold font-custom text-2xl text-gray-800">
        <div class="">
        </div>
        <div class="">
            <button type="button" class=" bg-green-500 p-2 m-1 px-4 text-white shadow font-custom text-base"
                    @click="Livewire.emit('add-selected')">
                add type
            </button>
        </div>
    </div>
    @if ($types->count())
        <div class="mx-2 gap-y-2 gap-x-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4" id="master-list">
            @each('products::components.one-product-type',$types,'item')
        </div>
    @endif
</div>
