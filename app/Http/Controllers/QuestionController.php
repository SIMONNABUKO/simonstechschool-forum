<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{   

      /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuestionResource::collection(Question::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
       // auth()->user()->question()->create($request->all());
        Question::create($request->all());

        $message = [
            'status'=> 'success',
            'message'=> 'question created successfully!'
        ];

        return response()->json($message, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {  
        
        $message = [
        'status'=>'error',
        'message'=>'Question not found'
       ];
   
        if(!$question){
            return response()->json($message, 404);
        }

        return new QuestionResource($question);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());

        
        $message = [
            'status'=> 'success',
            'message'=> 'question updated successfully!'
        ];

        return response()->json($message, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {   
        $message = [
            'status'=> 'success',
            'message'=> 'question deleted successfully!'
        ];
        $question->delete();
        return response()->json($message, 200);

    }
}