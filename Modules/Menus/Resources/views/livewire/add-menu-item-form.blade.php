<div class="relative">
    <div class="grid-cols-3 grid">
        <div class="mb-5">
            <label>Name</label>
        </div>
        <input wire:model.defer="menuItem.parent_id" type="hidden"/>
        <div class="col-span-2">
            <input wire:model.defer="menuItem.name" type="text" class="form-control"/>
            @if ($errors->has('menuItem.name'))
                <p style="color: red;">{{$errors->first('menuItem.name')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Url</label>
        </div>
        <div class="col-span-2">
            <input wire:model.defer="menuItem.url" type="text" class="form-control"/>
            @if ($errors->has('menuItem.url'))
                <p style="color: red;">{{$errors->first('menuItem.url')}}</p>
            @endif
        </div>
        <div class="justify-end flex w-full col-span-3">
            <button wire:click="save()" class="bg-green-500 p-2 m-1 rounded-md text-white shadow border font-custom">Save</button>
        </div>
    </div>
</div>
