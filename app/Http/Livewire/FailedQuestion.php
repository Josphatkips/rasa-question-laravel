<?php

namespace App\Http\Livewire;

use App\Models\FailedQuestion as ModelsFailedQuestion;
use Livewire\Component;
use Livewire\WithPagination;
class FailedQuestion extends Component
{
    use WithPagination;
    
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {


        $failed_question= ModelsFailedQuestion::join('categories','categories.id','!=','failed_questions.category_id')
        ->select('failed_questions.*','categories.name')
        ->where([
            ['categories.user_id',auth()->user()->id],
            ['answered','like', '%'.$this->search.'%']
            ])
        ->paginate(1);
        

        return view('livewire.failed-question', compact('failed_question'));
    }
}
