<?php

namespace Modules\Products\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Products\Entities\ProductStatus;

class ProductStatusesManager extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshStatusesList' => '$refresh',
    ];
    public $selectedStatus;

    public function mount()
    {
        $this->selectedStatus= new ProductStatus();
    }

    public function deleteStatus($status)
    {
        ProductStatus::destroy($status);
        $this->emit('refreshStatusesList');
    }

    public function selectStatus($item_id)
    {
        $this->selectedStatus = ProductStatus::where('id', $item_id)->get();

    }

    public function render()
    {
        $statuses = ProductStatus::with('products')->orderBy('name')->get();
        return view('products::livewire.product-statuses-manager', ['statuses' => $statuses]);
    }
}
