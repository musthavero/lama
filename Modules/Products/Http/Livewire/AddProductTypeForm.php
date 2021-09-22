<?php

namespace Modules\Products\Http\Livewire;

use Livewire\Component;
use Modules\Products\Entities\ProductType;

class AddProductTypeForm extends Component
{

    public ProductType $type;
    public $activeType;

    protected $listeners = [
        'getModelId',
        'close-modal' => 'resetForm',
        'change-selected' => 'fillForm',
        'add-selected' => 'newForm',
    ];

    protected $rules = [
        'type.name' => 'required|min:2|max:25',
        'type.allowed_level' => 'required',
        'type.is_visible' => 'numeric',
    ];

    public function resetForm()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->type = new ProductType();
        $this->type->is_visible = 1;
    }

    public function render()
    {
        return view('products::livewire.add-product-type-form');
    }

    public function newForm()
    {
        $this->type = new ProductType();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('show-type-modal');
    }

    public function fillForm($selectedItem)
    {
        $this->activeType = $selectedItem;
        if (!$this->type = ProductType::where('id', $this->activeType)->first()) {
            $this->type = new ProductType();
        }
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('show-type-modal');
    }

    public function save()
    {
        $this->validate();
        if (!isset($this->type->is_visible))
            $this->type->is_visible = 1;
        $this->type->save();
        $this->emit('refreshTypesList');
        $this->emit('close-type-modal');
        $this->dispatchBrowserEvent('close-type-modal');
    }
}
