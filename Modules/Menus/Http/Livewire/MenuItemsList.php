<?php

namespace Modules\Menus\Http\Livewire;

use Livewire\Component;
use Modules\Menus\Entities\Menu;
use Modules\Menus\Entities\MenuItem;

class MenuItemsList extends Component
{
    public $activeMenu;

    protected $listeners = [
        'refreshMenuItemsList' => '$refresh',
        'menu-changed' => 'changeMenu',
        'menu-deleted' => 'menuDeleted',
        'changed-position' => 'reorderMenuItems',
    ];

    public function render()
    {
        $theMenu = Menu::where('id', $this->activeMenu)->first();
        $menuItems = MenuItem::where('menu_id', $this->activeMenu)->where('parent_id', 0)->orderBy('sort')->get();
        $this->dispatchBrowserEvent('menu-items-list-refreshed');
        return view('menus::livewire.menu-items-list', [
            'menus' => $menuItems,
            'theMenu' => $theMenu,
        ]);
    }

    public function deleteMenuItem($menuItem)
    {
        MenuItem::destroy($menuItem);
    }

    public function changeMenu($menuId)
    {
        $this->activeMenu = $menuId;
    }

    public function menuDeleted()
    {
        if (!Menu::where('id', $this->activeMenu)->first()) {
            $theMenu = Menu::first();
            $this->activeMenu = $theMenu->id;
        }
    }

    public function reorderMenuItems($theArray)
    {
        $to = $theArray[0];
        $what = $theArray[1];
        $position = $theArray[2];

        if ($tmp = MenuItem::where('id', $what)->first()) {
            if ($to == 'master-list') {
                $tmp->parent_id = 0;
            } else {
                if (is_numeric($toId = substr($to, 2)))
                    $tmp->parent_id = $toId;
            }
            $tmp->sort = $position;
            $tmp->save();
            $mi = MenuItem::where('menu_id',$tmp->menu_id)->where('parent_id',$tmp->parent_id)->where('id','!=',$tmp->id)->orderby('sort')->get();
            $mi->splice($position,0,[$tmp]);
            $tpos = 0;
            foreach ($mi as $item) {
                MenuItem::where('id', $item->id)->update(['sort' => $tpos]);
                $tpos++;
            }
        }
    }
}
