<?php

namespace App\Http\Controllers;

use App\SubTopic;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MyTestController extends Controller
{

    public function index()
    {

        return response()->json(200);

        // $name='Yuges';
        // Mail::to('sivayuges@gmail.com')->send(new TestMail($name));

        // return 1;
        // $subTopic = Subtopic::with('questions', 'questions.answers')->find(641);
        // // dd($subTopic->questions->pluck('answers')->flatten()->pluck('pivot.nextquestionid'));
        // $answers = $subTopic->questions->pluck('answers')->flatten();
        // $path = collect();
        // $pathFound = collect();
        // $answers->each(function ($answer) use ($path, $pathFound){
        //     if ($answer->getNextQuestion()) {
        //         $path->push($answer);
        //     }else{
        //         $pathFound->push($answer);

        //     }
        // });
        // dump($path);
        // dump($pathFound);

        // dd($subTopic->questions->pluck('answers'));

        // return $subTopic;
    }
}
