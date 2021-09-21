<?php

namespace Modules\Menus\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Menus\Entities\MenuItem;

class AdminMenuManager extends Component
{
    use WithPagination;

    public $activeMenu = 1;
    public $selectedMenu;

    public function mount() {
        $this->selectedMenu = new MenuItem();
    }

    public function selectItem($item_id)
    {
        $this->selectedMenu = MenuItem::where('id',$item_id)->get();
    }

    public function render()
        {
        return view('menus::livewire.admin-menu-manager');
    }
}
