<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Question as ModelsQuestion;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Question extends Component
{
    use WithPagination, WithFileUploads;
   
    public $editid;
    public $search = '';
    public $open=false;
    public $openedit=false;
    public $image;
    public $image2;
    public $category;
    public $question;
    public $answer;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $questions= ModelsQuestion::with('category')->where([
            ['user_id',auth()->user()->id],
            ['question','like', '%'.$this->search.'%']
            ])->paginate(50);
        $categories=Category::where('user_id',auth()->user()->id)->get();
        // Log::info($questions);
        return view('livewire.question',compact('questions','categories'));
    }
    public function closeModal(){
        // Log::info("hello");
        $this->open=false;
        $this->openedit=false;
    }
    public function openModal(){
        $this->open=true;
    }

    public function saveQuestion(){
        $this->validate([
            'image' => 'image', // 1MB Max
        ]);
        $t=time();
       $res= $this->image->storeAs('images', $t.$this->image->getClientOriginalName());

       $quiz= new ModelsQuestion;
       $quiz->question=$this->question;
       $quiz->answer=$this->answer;
       $quiz->category_id=$this->category;
       $quiz->image=$t.$this->image->getClientOriginalName();
       $quiz->user_id=auth()->user()->id;

       $quiz->save();
       $this->open=false;
       session()->flash('message', "Success");
        
    }

    public function deleteQuestion($id){
        ModelsQuestion::destroy($id);
        session()->flash('message', "Success");

    }
    public function openEdit($id){
        $this->editid=$id;
        $res= ModelsQuestion::find($id);
        $this->image2= $res->image;
        // $this->image= asset('storage/images/'.$res->image)
        $this->category=$res->category_id;
        $this->question=$res->question;
        $this->answer=$res->answer;

        Log::info($res);
        
        $this->openedit=true;

    }

    public function updateQuestion(){
        $quiz=  ModelsQuestion::find($this->editid);

        $filename="";

        if($this->image){
            $this->validate([
                'image' => 'image|max:2024', // 1MB Max
            ]);
            $t=time();
           $res= $this->image->storeAs('images', $t.$this->image->getClientOriginalName());
           $filename=$t.$this->image->getClientOriginalName();

        }else{
            $filename=$quiz->image;

        }
        

       
       $quiz->question=$this->question;
       $quiz->answer=$this->answer;
       $quiz->category_id=$this->category;
       $quiz->image=$filename;
       $quiz->user_id=auth()->user()->id;

       $quiz->save();
       $this->open=false;
       $this->openedit=false;
       session()->flash('message', "Success");
        
    }
    
}
