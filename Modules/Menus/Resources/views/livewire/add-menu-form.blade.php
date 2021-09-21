<div>
    <div class="mb-5">
        <label>Menu Name</label>
        <input wire:model="menu.name" type="text" class="form-control"/>
        @if ($errors->has('menu.name'))
            <p style="color: red;">{{$errors->first('menu.name')}}</p>
        @endif
    </div>
    <div class="mb-5">
        <label>Min Access Level</label>
        <input wire:model="menu.access_level" type="text" class="form-control"/>
        @if ($errors->has('menu.access_level'))
            <p style="color: red;">{{$errors->first('menu.access_level')}}</p>
        @endif
    </div>
    <div>
    </div>
    <button wire:click="save()" class="bg-green-500 p-3 text-white">Save</button>

</div>
