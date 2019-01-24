<?php

namespace App\Http\Controllers;

use App\MainTopic;
use App\SubTopic;
use Illuminate\Http\Request;

class MainTopicController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $mainTopics=MainTopic::all();
    return view('mainTopics.index', compact('mainTopics'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $subTopics=SubTopic::all();
    // dd($subTopics[1]);
    return view('mainTopics.create', compact('subTopics'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $this->validate($request, [
      'name' => 'required',
      'slug' => 'required|unique:AS_mainTopics,slug',
      'description' => 'required',
      'filename' => 'required',
      'order' => 'required',
      'subTopics' => 'required',
    ]);

    $mainTopic = MainTopic::create([
      'name'=>$request->input('name'),
      'slug'=>$request->input('slug'),
      'description'=>$request->input('description'),
      'filename'=>$request->input('filename'),
      'order'=>$request->input('order'),
      'is_used'=>$request->input('is_used')
    ]);
    // dd($request->input('subTopics'));
$mainTopic->subTopics()->attach($request->input('subTopics'));
    return redirect()->route('mainTopics.index')->with('success', 'new main topic created');


  }

  /**
  * Display the specified resource.
  *
  * @param  \App\MainTopic  $MainTopic
  * @return \Illuminate\Http\Response
  */
  public function show(MainTopic $mainTopic)
  {

    return view('mainTopics.show', compact('mainTopic'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\MainTopic  $MainTopic
  * @return \Illuminate\Http\Response
  */
  public function edit(MainTopic $mainTopic)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\MainTopic  $mainTopics
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, MainTopic $mainTopic)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\MainTopic  $mainTopics
  * @return \Illuminate\Http\Response
  */
  public function destroy(MainTopic $mainTopic)
  {
    //
  }
}
