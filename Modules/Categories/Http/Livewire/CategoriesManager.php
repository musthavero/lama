<?php

namespace Modules\Categories\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Categories\Entities\Category;

class CategoriesManager extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshCategoriesList' => '$refresh',
        'changed-position' => 'reorderCategories',
    ];
    public $selectedCategory;

    public function mount()
    {
        $this->selectedCategory = new Category();
    }

    public function deleteCategory($category)
    {
        Category::destroy($category);
        $this->emit('refreshCategoriesList');
    }

    public function selectCategory($item_id)
    {
        $this->selectedCategory = Category::where('id', $item_id)->get();

    }

    public function reorderCategories($theArray)
    {
        $to = $theArray[0];
        $what = $theArray[1];
        $position = $theArray[2];

        if ($tmp = Category::where('id', $what)->first()) {
            if ($to == 'master-list') {
                $tmp->parent_id = 0;
            } else {
                if (is_numeric($toId = substr($to, 2)))
                    $tmp->parent_id = $toId;
            }
            $tmp->sort = $position;
            $tmp->save();
            $mi = Category::where('parent_id',$tmp->parent_id)->where('id','!=',$tmp->id)->orderby('sort')->get();
            $mi->splice($position,0,[$tmp]);
            $tpos = 0;
            foreach ($mi as $item) {
                Category::where('id', $item->id)->update(['sort' => $tpos]);
                $tpos++;
            }
        }
    }

    public function render()
    {
        $categories = Category::with('children','children.children')->where('parent_id', 0)->orderBy('sort')->get();
        return view('categories::livewire.categories-manager', ['categories' => $categories]);
    }
}
