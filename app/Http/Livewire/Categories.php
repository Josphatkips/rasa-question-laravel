<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Categories extends Component
{
    public $open=false;
    public $count=1;
    public $category;
    public function render()
    {
        $category= Category::where('user_id',auth()->user()->id)->orderBy('name','ASC')->get();
        return view('livewire.categories', compact($category));
    }

    public function closeModal(){
        // Log::info("hello");
        $this->open=false;

    }
    public function openModal(){
        $this->open=true;

    }
    public function saveCategory(){
        $cat= new Category;
        $cat->name=$this->category;
        $cat->user_id=auth()->user()->id;
        $cat->save();
      
        $this->open=false;
        session()->flash('message', "Success");

    }
}
