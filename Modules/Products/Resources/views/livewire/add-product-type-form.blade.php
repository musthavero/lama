<div>
    <div class="grid-cols-3 grid">
        <div class="mb-5">
            <label>Type Name</label>
        </div>
        <div class="col-span-2">
            <input wire:model.defer="type.name" type="text" class="form-control"/>
            @if ($errors->has('type.name'))
                <p style="color: red;">{{$errors->first('type.name')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Allowed Level</label>
        </div>
        <div class="col-span-2">
            <input wire:model.defer="type.allowed_level" type="text" class="form-control"/>
            @if ($errors->has('type.allowed_level'))
                <p style="color: red;">{{$errors->first('type.allowed_level')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Visibility</label>
        </div>
        <div class="col-span-2">
            <select name="is_visible" wire:model="type.is_visible">
                <option default value="1">Is Visible</option>
                <option value="0">Is Not Visible</option>
            </select>
            @if ($errors->has('type.is_visible'))
                <p style="color: red;">{{$errors->first('type.is_visible')}}</p>
            @endif
        </div>
        <div class="justify-end flex w-full col-span-3">
            <button wire:click="save()" class="bg-green-500 p-3 text-white">Save</button>
        </div>
    </div>
</div>
