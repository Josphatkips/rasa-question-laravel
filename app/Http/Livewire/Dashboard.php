<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
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
        $res= User::find(auth()->user()->id);
        if($res->chatbot_code==''){
            $res->chatbot_code=hash('crc32b',auth()->user()->email.auth()->user()->id);
            $res->save();
            $res= User::find(auth()->user()->id);
        }

        Log::info($res);

        $this->url=env('CLIENT_URL').'?user_id='.$res->chatbot_code;
        $this->open=true;

    }
    public function closeModal(){
        
        $this->open=false;

    }
}
