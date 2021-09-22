<div>
    <div class="grid-cols-3 grid">
        <div class="mb-5">
            <label>Category Name</label>
        </div>
        <div class="col-span-2">
            <input wire:model.defer="category.name" type="text" class="form-control"/>
            @if ($errors->has('category.name'))
                <p style="color: red;">{{$errors->first('category.name')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Url</label>
        </div>
        <div class="col-span-2">
            <input wire:model.defer="category.url" type="text" class="form-control"/>
            @if ($errors->has('category.url'))
                <p style="color: red;">{{$errors->first('category.url')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Parent</label>
        </div>
        <div class="col-span-2">
            <select name="parent_id" wire:model="category.parent_id">
                <option value="0">No parent (base category)</option>
                @foreach($availableParents as $parent)
                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('category.parent_id'))
                <p style="color: red;">{{$errors->first('category.parent_id')}}</p>
            @endif
        </div>
        <div class="mb-5">
            <label>Description</label>
        </div>
        <div class="col-span-2">
            <textarea rows=5 cols=50 wire:model.defer="category.description" type="text" class="form-control">
                </textarea>
            @if ($errors->has('category.description'))
                <p style="color: red;">{{$errors->first('category.description')}}</p>
            @endif
        </div>
        <div class="justify-end flex w-full col-span-3">
            <button wire:click="save()" class="bg-green-500 p-3 text-white">Save</button>
        </div>
    </div>
</div>
