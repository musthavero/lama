<?php

namespace Modules\Products\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Products\Entities\ProductType;

class ProductTypesManager extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshTypesList' => '$refresh',
    ];
    public $selectedType;

    public function mount()
    {
        $this->selectedType= new ProductType();
    }

    public function deleteStatus($type)
    {
        ProductType::destroy($type);
        $this->emit('refreshTypesList');
    }

    public function selectStatus($item_id)
    {
        $this->selectedType = ProductType::where('id', $item_id)->get();

    }

    public function render()
    {
        $types = ProductType::with('products')->orderBy('name')->get();
        return view('products::livewire.product-types-manager', ['types' => $types]);
    }
}
