<?php

namespace Modules\Menus\Http\Livewire;

use Livewire\Component;
use Modules\Menus\Entities\MenuItem;

class AddMenuItemForm extends Component
{

    public MenuItem $menuItem;
    public $activeMenu;
    public $availableParents;
    public $selectedItem;
    protected $listeners = [
        'menu-changed' => 'update_active_menu',
        'change-selected' => 'fillForm',
        'add-selected' => 'newForm',
    ];

    protected $rules = [
        'menuItem.name' => 'required|min:2|max:20',
        'menuItem.url' => 'required',
        'activeMenu' => 'numeric|nullable',
    ];

    public function update_active_menu($menuId)
    {
        $this->activeMenu = $menuId;
    }

    public function newForm()
    {
        $this->menuItem = new MenuItem();
        $this->menuItem->menu_id = $this->activeMenu;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('open-menu-item-modal');
    }

    public function fillForm($selectedItem)
    {
        $this->selectedItem = $selectedItem;
        if (!$this->menuItem = MenuItem::where('id', $this->selectedItem)->first()) {
            $this->menuItem = new MenuItem();
            $this->menuItem->menu_id = $this->activeMenu;
        }
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('open-menu-item-modal');
    }

    public function render()
    {
        return view('menus::livewire.add-menu-item-form', ['activeMenu' => $this->activeMenu, 'availableParents' => $this->availableParents, 'selectedItem' => $this->selectedItem]);
    }

    public function save()
    {
        if ($this->activeMenu) {
            $this->menuItem->menu_id = $this->activeMenu;
        } else {
            $this->menuItem->menu_id = 0;
        }
        if (!$this->menuItem->parent_id)
            $this->menuItem->parent_id = 0;
        $this->validate();
        $this->menuItem->save();
        $this->dispatchBrowserEvent('close-menu-item-modal');
        $this->emit('refreshMenuItemsList');
    }
}
