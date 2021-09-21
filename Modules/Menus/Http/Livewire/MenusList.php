<?php

namespace Modules\Menus\Http\Livewire;

use Livewire\Component;
use Modules\Menus\Entities\Menu;

class MenusList extends Component
{
    public $activeMenu;

    protected $listeners = [
        'refreshMenusList' => '$refresh'
    ];

    public function deleteMenu($menu)
    {
        Menu::destroy($menu);
        $this->emit('menu-deleted');
        $this->emit('refreshMenusList');
        $this->emit('refreshMenuItemsList');
    }

    public function reorderMenus($items)
    {

    }

    public function selectMenu($item)
    {
        $this->activeMenu = $item;
        $this->emit('menu-changed',$this->activeMenu);
    }
    public function render()
    {
        $menus = Menu::all();
        return view('menus::livewire.menus-list', [
            'menus' => $menus,
        ]);
    }
}
