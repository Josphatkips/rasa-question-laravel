<?php

namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // foreach ($row as $r => $r_value){
        //     Log::info($r_value);

        // }
        $category_id=1;
        // Log::info($row);
        return new Question([
            "question" => $row[0],
            "answer" => $row[1],
            "category_id" =>  $category_id,
            "user_id" =>  auth()->user()->id,

            //

        ]);
    }
}
