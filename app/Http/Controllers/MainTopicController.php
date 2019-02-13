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
      'filename' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
      'order' => 'required',
      'subTopics' => 'required',
    ]);
    $mainTopic = MainTopic::create([
      'name'=>$request->input('name'),
      'slug'=>$request->input('slug'),
      'description'=>$request->input('description'),
      'filename'=>1,
      'order'=>$request->input('order'),
      'is_used'=>1
    ]);
    $mainTopic->subTopics()->attach($request->input('subTopics'));

    if($request->hasFile('filename')){
      $image= $request->file('filename');
      $name=$mainTopic->id.'.'.$image->getClientOriginalExtension();
      $destinationPath ='D:/Websites/images.dlf.org.uk/htdocs/sara4/dynamic/mainTopics_images';
      $image->move($destinationPath, $name);
      $mainTopic->filename=$name;
      $mainTopic->update();
    }
    // dd($request->input('subTopics'));
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
    $subTopics=SubTopic::all();
    return view('mainTopics.show', compact('mainTopic', 'subTopics'));
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

    $this->validate($request, [
      'name' => 'required',
      'slug' => 'required',
      'description' => 'required',
      'filename' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
      'order' => 'required',
    ]);
    $mainTopic->name =$request->input('name');
    $mainTopic->slug =$request->input('slug');
    $mainTopic->description =$request->input('description');
    $mainTopic->order =$request->input('order');
    $mainTopic->is_used =$request->input('is_used') ? 1 : 0;

    if($request->hasFile('filename')){
      $image= $request->file('filename');
      $name=$mainTopic->id.'.'.$image->getClientOriginalExtension();
      $destinationPath =config('sara.saraImagesPath').'/mainTopics_images';
      $image->move($destinationPath, $name);
      $mainTopic->filename=$name;
    }
    $mainTopic->update();
    return redirect()->back()->with('success', 'Main Topic Updated');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\MainTopic  $mainTopics
  * @return \Illuminate\Http\Response
  */
  public function destroy(MainTopic $mainTopic)
  {
    $mainTopic->delete();

    return redirect()->back()->with('success', 'Main Topic Deleted');

  }

  public function removeSubtopic(Request $request, MainTopic $mainTopic)
  {
    $mainTopic->subTopics()->detach($request->input('subtopic_id'));
    return redirect()->back()->with('success', 'SubTopic removed from the list');

  }

  public function addSubtopic(Request $request, MainTopic $mainTopic)
  {


    //
    $this->validate($request, [
      'subTopics' => 'required'
    ]);

    $mainTopic->subTopics()->syncWithoutDetaching($request->input('subTopics'));
    return redirect()->back()->with('success', 'SubTopic added to main topic');

  }
}
