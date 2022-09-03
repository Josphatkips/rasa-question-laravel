<?php

namespace App\Http\Livewire;

use App\Imports\QuestionsImport;
use App\Models\Category;
use App\Models\Question as ModelsQuestion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Question extends Component
{
    use WithPagination, WithFileUploads;
   
    public $editid;
    public $search = '';
    public $open=false;
    public $openexcel=false;
    public $openedit=false;
    public $image;
    public $excel;
    public $image2;
    public $category;
    public $question;
    public $answer;

    public $selected_id=[];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function downloadTemplate()
    {
        return Storage::disk('local')->download('questiontemplate.xlsx');
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
        $this->openexcel=false;
    }
    public function openModal(){
        $this->open=true;
    }
    public function openExcel(){
        $this->openexcel=true;
    }
    public function duplicate($id){

       
        $post = ModelsQuestion::find($id);
        $newPost = $post->replicate();
        $newPost->created_at = Carbon::now();
        $newPost->save();
        
    }
    public function editSelection(){
        // $this->open=true;
        // Log::info("clicked");

        if(empty($this->selected_id)){
            session()->flash('message', "Select atleast one question");
            return;
        }
        if(!$this->category){
            session()->flash('message', "Select category");

            return;
        }
        foreach($this->selected_id as $si){
            $nw= ModelsQuestion::find($si);
            $nw->category_id=$this->category;
            $nw->save();

        }
        $this->selected_id=[];
        session()->flash('message', "Success");
    }

    public function saveQuestion(){
        $filename="";

        if($this->image){

        $this->validate([
            'image' => 'image', // 1MB Max
        ]);
        $t=time();
       $res= $this->image->storeAs('images', $t.$this->image->getClientOriginalName());
       $filename=$t.$this->image->getClientOriginalName();
    }else{
        $filename="";
    }

        // Log::info($this->image);
        

       $quiz= new ModelsQuestion;
       $quiz->question=$this->question;
       $quiz->answer=$this->answer;
       $quiz->category_id=$this->category;
       $quiz->image=$filename;
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

    public function saveExcelQuestion()
{
    Excel::import(new QuestionsImport, $this->excel);

    session()->flash('message', "Success");
    

        // return redirect()->route('users.index')->with('success', 'User Imported Successfully');
}
    
}
