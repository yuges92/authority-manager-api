<?php

namespace App\Http\Controllers;

use App\SubTopic;
use Illuminate\Http\Request;

class MyTestController extends Controller
{

    public function index()
    {
        $subTopic = Subtopic::with('questions', 'questions.answers')->find(641);
        // dd($subTopic->questions->pluck('answers')->flatten()->pluck('pivot.nextquestionid'));
        $answers = $subTopic->questions->pluck('answers')->flatten();
        $path = collect();
        $pathFound = collect();
        $answers->each(function ($answer) use ($path, $pathFound){
            if ($answer->getNextQuestion()) {
                $path->push($answer);
            }else{
                $pathFound->push($answer);

            }
        });
        dump($path);
        dump($pathFound);

        // dd($subTopic->questions->pluck('answers'));

        // return $subTopic;
    }
}
