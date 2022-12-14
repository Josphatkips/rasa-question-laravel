<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    public $open=false;
    public $openedit=false;
    public $count=1;
    public $category;
    public $editid;
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $categories= Category::withCount('questions')->where([
            ['user_id',auth()->user()->id],
            ['name','like', '%'.$this->search.'%']
            ])->orderBy('name','ASC')->get();

            // Log::info($categories);
        return view('livewire.categories', compact('categories'));
    }

    public function closeModal(){
        // Log::info("hello");
        $this->open=false;
        $this->openedit=false;

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
    public function updateCategory(){
        Log::info("this is it");
        $cat= Category::find($this->editid);
        $cat->name=$this->category;
        // $cat->user_id=auth()->user()->id;
        $cat->save();
      
        $this->open=false;
        $this->openedit=false;
        $this->category="";
        session()->flash('message', "Success");

    }
    public function openEdit($id,$title){
        $this->category=$title;
        $this->editid=$id;
        $this->openedit=true;

    }
    public function deleteCategory($id){
        $res= Question::where('category_id',$id)->first();

        if($res){
            session()->flash('message', "You cannot delete Category with Questions");

        }else{
            Category::destroy($id);
            session()->flash('message', "Success");

        }
    }
}
