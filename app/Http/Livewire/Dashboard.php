<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Dashboard extends Component
{
    public $open=false;
    public $url;
    public function render()
    {
        $cats=Category::where('user_id',auth()->user()->id)->count();
        $quiz=Question::where('user_id',auth()->user()->id)->count();
        return view('livewire.dashboard', compact('cats','quiz'));
    }
    public function openModal(){
        $this->url=env('CLIENT_URL').auth()->user()->id;
        
        $this->open=true;

    }
    public function closeModal(){
        
        $this->open=false;

    }
}
