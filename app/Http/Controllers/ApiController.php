<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function categories( Request $request){
        // dd(Category::all());
        $categories= Category::where('user_id','=',$request->user_id)->get();
        if(empty($categories)){
            return response(
                [
                'message' => 'No Categories ','response_code'=>0,'categories'=>$categories
                ]
        );

        }
        return response(
            [
            'message' => 'Categories ','response_code'=>1,'categories'=>$categories
            ]
    );
    }
    public function getQuestions($id){
        $questions= Question::where('category_id','=',$id)->get();
        if(empty($questions)){
            return response(
                [
                'message' => 'No Categories ','response_code'=>0,'categories'=>$questions
                ]
        );

        }
        return response(
            [
            'message' => 'Questions ','response_code'=>1,'categories'=>$questions
            ]
    );
    }
    public function getAnswer($id){
        $answer= Question::where('id','=',$id)->first();
        if(!$answer){
            return response(
                [
                'message' => 'No Question ','response_code'=>0,'answer'=>''
                ]
        );

        }
        return response(
            [
            'message' => 'Questions ','response_code'=>1,'answer'=>$answer->answer
            ]
    );
    }
    public function getQuery(Request $request){
        $answer= Question::where('question','like',"%".$request->question."%")->first();
        if(!$answer){
            return response(
                [
                'message' => 'No Question ','response_code'=>0,'answer'=>''
                ]
        );

        }
        return response(
            [
            'message' => 'Questions ','response_code'=>1,'answer'=>$answer->answer
            ]
    );
    }
}
