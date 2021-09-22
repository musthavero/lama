<?php

namespace Modules\Categories\Http\Livewire;

use Livewire\Component;
use Modules\Categories\Entities\Category;

class AddCategoryForm extends Component
{

    public Category $category;
    public $activeCategory;
    public $availableParents;

    protected $listeners = [
        'getModelId',
        'close-modal' => 'resetForm',
        'change-selected' => 'fillForm',
        'add-selected' => 'newForm',
    ];

    protected $rules = [
        'category.name' => 'required|min:2|max:25',
        'category.url' => 'required',
        'category.description' => 'required',
        'category.parent_id'=>'',
    ];

    public function resetForm()
    {
        $this->mount();
        $this->render();
    }

    public function newForm()
    {
        $this->category = new Category();
        $this->availableParents = Category::where('parent_id',0)->orderBy('sort')->get();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('show-category-modal');
    }

    public function fillForm($selectedItem)
    {
        $this->activeCategory = $selectedItem;
        $this->availableParents = Category::where('parent_id',0)->orderBy('sort')->get();
        if (!$this->category = Category::where('id', $this->activeCategory)->first()) {
            $this->category = new Category();
        }
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('show-category-modal');
    }

    public function mount()
    {
        $this->category = new Category();
        $this->category->parent_id = 0;
        $this->availableParents = Category::where('parent_id',0)->get();
    }

    public function render()
    {
        return view('categories::livewire.add-category-form');
    }

    public function save()
    {
        $this->validate();
        if (!$this->category->parent_id)
            $this->category->parent_id = 0;
        if (!$this->category->meta)
            $this->category->meta = '';
        $this->category->save();
        $this->emit('refreshCategoriesList');
        $this->emit('close-category-modal');
        $this->dispatchBrowserEvent('close-category-modal');
    }
}
