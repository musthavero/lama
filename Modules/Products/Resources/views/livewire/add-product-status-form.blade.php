<div>
    <div class="grid-cols-3 grid">
        <div class="mb-5">
            <label>Status Name</label>
        </div>
        <div class="col-span-2">
            <input wire:model.defer="status.name" type="text" class="form-control"/>
            @if ($errors->has('status.name'))
                <p style="color: red;">{{$errors->first('status.name')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Allowed Level</label>
        </div>
        <div class="col-span-2">
            <input wire:model.defer="status.allowed_level" type="text" class="form-control"/>
            @if ($errors->has('status.allowed_level'))
                <p style="color: red;">{{$errors->first('status.allowed_level')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Visibility</label>
        </div>
        <div class="col-span-2">
            <select name="is_visible" wire:model="status.is_visible">
                <option default value="1">Is Visible</option>
                <option value="0">Is Not Visible</option>
            </select>
            @if ($errors->has('status.is_visible'))
                <p style="color: red;">{{$errors->first('status.is_visible')}}</p>
            @endif
        </div>
        <div class="justify-end flex w-full col-span-3">
            <button wire:click="save()" class="bg-green-500 p-3 text-white">Save</button>
        </div>
    </div>
</div>
