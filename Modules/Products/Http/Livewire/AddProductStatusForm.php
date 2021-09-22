<?php

namespace Modules\Products\Http\Livewire;

use Livewire\Component;
use Modules\Products\Entities\ProductStatus;

class AddProductStatusForm extends Component
{

    public ProductStatus $status;
    public $activeStatus;

    protected $listeners = [
        'getModelId',
        'close-modal' => 'resetForm',
        'change-selected' => 'fillForm',
        'add-selected' => 'newForm',
    ];

    protected $rules = [
        'status.name' => 'required|min:2|max:25',
        'status.allowed_level' => 'required',
        'status.is_visible' => 'numeric',
    ];

    public function resetForm()
    {
        $this->mount();
        $this->render();
    }

    public function newForm()
    {
        $this->status = new ProductStatus();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('show-status-modal');
    }

    public function fillForm($selectedItem)
    {
        $this->activeStatus = $selectedItem;
        if (!$this->status = ProductStatus::where('id', $this->activeStatus)->first()) {
            $this->status = new ProductStatus();
        }
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('show-status-modal');
    }

    public function mount()
    {
        $this->status = new ProductStatus();
        $this->status->is_visible = 1;
    }

    public function render()
    {
        return view('products::livewire.add-product-status-form');
    }

    public function save()
    {
        $this->validate();
        if ((!$this->status->is_visible) && ($this->status->is_visible!=0))
            $this->status->is_visible = 1;
        $this->status->save();
        $this->emit('refreshStatusesList');
        $this->emit('close-status-modal');
        $this->dispatchBrowserEvent('close-status-modal');
    }
}
