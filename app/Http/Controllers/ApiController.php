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
        if(count($categories)==0){
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
    public function getQuestions(Request $request){
        $questions= Question::where('category_id','=',$request->category_id)->get();
        if(count($questions)==0){
            return response(
                [
                'message' => 'No Question in this category Try another category ','response_code'=>0,'questions'=>$questions
                ]
        );

        }
        return response(
            [
            'message' => 'Questions ','response_code'=>1,'questions'=>$questions
            ]
    );
    }
    public function getAnswer(Request $request){
        $answer= Question::where('id','=',$request->question_id)->first();
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
        $answer= Question::where([

            ['question','like',"%".$request->question."%"],
            ['category_id','=',$request->category],
        ])->first();
        if(!$answer){
            return response(
                [
                'message' => "Sorry, I can't find that question ",'response_code'=>0,'answer'=>''
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
