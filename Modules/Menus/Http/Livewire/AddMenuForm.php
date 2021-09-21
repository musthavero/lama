<?php

namespace Modules\Menus\Http\Livewire;

use Livewire\Component;
use Modules\Menus\Entities\Menu;

class AddMenuForm extends Component
{

    public Menu $menu;
    public $activeMenu;

    protected $listeners = [
        'getModelId',
        'close-modal' => 'resetForm'
    ];

    protected $rules = [
        'menu.name' => 'required|min:5|max:25',
        'menu.access_level' => 'required',
    ];

    public function mount() {
        $this->menu = new Menu();
        $this->menu->menu_id =0;
    }

    public function resetForm () {
        $this->mount();
        $this->render();
    }
    public function save()
    {
        $this->validate();
        $this->menu->save();
        $this->emit('refreshMenusList');
        $this->emit('close-modal');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('menus::livewire.add-menu-form');
    }
}
