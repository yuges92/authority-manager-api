<?php

namespace App\Http\Controllers;

use App\Package;
use App\MainTopic;
use App\CustomMainTopicPackageSubTopic;
use Illuminate\Http\Request;

class PackageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $title='Packages';
    $packages=Package::all();

    return view('sara-packages.index', compact('title', 'packages'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $title='New Package';
    $mainTopics=MainTopic::all();
    return view('sara-packages.create', compact('title', 'mainTopics'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {


    // dd($request->input('custom-subTopics')[2]);

    $this->validate($request, [
      'name' => 'required|unique:AS_packages,name',
      'description' => 'required',
    ]);

    $package = new Package();
    $package->name=$request->input('name');
    $package->description=$request->input('description');
    $package->type=$request->input('type');
    $package->isActive=1;
    $package->save();
    if($package->type=='standard'){
      $package->mainTopics()->attach($request->input('maintopics') );

    }else {
      foreach ($request->input('custom-maintopics') as $mainTopic_id) {
        foreach ($request->input('custom-subTopics')[$mainTopic_id] as $subTopic_id) {
          $package->customMainTopics()->attach($mainTopic_id, ['subTopic_id'=>$subTopic_id] );
        }
      }

      // $package->customMainTopics()->attach([$mainTopic_id, ['subTopic_id'=>$subTopic_id]] );

    }

    return redirect()->route('packages.index')->with('success', 'new package Created');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Package  $package
  * @return \Illuminate\Http\Response
  */
  public function show(Package $package)
  {
    $mainTopics=MainTopic::all();
    // $customMainTopics=$package->customMainTopics->unique('id');
    // dd($customMainTopics);
    if($package->type=='custom'){
      return view('sara-packages.show', compact('package','mainTopics'));

    }
    return view('sara-packages.show', compact('package','mainTopics'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Package  $package
  * @return \Illuminate\Http\Response
  */
  public function edit(Package $package)
  {
    return view('sara-packages.edit', compact('package'));

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Package  $package
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Package $package)
  {
    $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
    ]);

    $package->name=$request->input('name');
    $package->description=$request->input('description');
    $package->isActive=$request->input('isActive') ? 1:0;
    // $package->isActive=1;
    $package->update();
    // $package->mainTopics()->attach($request->input('maintopics'));
    return redirect()->back()->with('success', 'new package Created');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Package  $package
  * @return \Illuminate\Http\Response
  */
  public function destroy(Package $package)
  {
    $package->delete();
    return redirect()->back()->with('success', 'Package Deleted');
  }



  public function removeMainTopic(Request $request, Package $package)
  {
    $package->mainTopics()->detach($request->input('mainTopic'));
    return redirect()->back()->with('success', 'Topic removed from the package');
  }

  public function addMainTopic(Request $request, Package $package)
  {
    $package->mainTopics()->syncWithoutDetaching($request->input('mainTopics'));
    return redirect()->back()->with('success', 'Topic added to the package');

  }


  public function getCustomSubTopics(Request $request, Package $package, MainTopic $mainTopic)
  {

    $results['mainTopic']=$mainTopic;
    $results['Subtopics']=$mainTopic->subTopics;
    $results['CustomChosenSubtopics']=$mainTopic->customSubTopics()->where('package_id', $package->id)->get();

    return response()->json($results);

  }




  public function updateCustomSubTopics(Request $request, Package $package, MainTopic $mainTopic)
  {
    // return response()->json($mainTopic);


    $data_to_sync = [];
    parse_str($request->formData, $data);
    // $mainTopic->customSubTopics()->wherePivot('package_id', $package->id)->sync($data['custom-subTopics']);
    if(isset($data['custom-subTopics']) && sizeof($data['custom-subTopics'])>0){
      foreach ($data['custom-subTopics'] as $subTopic_id) {
        $data_to_sync[$subTopic_id]= ['mainTopic_id'=>$mainTopic->id];
      }
    }

    $results=$package->customSubTopics()
                     ->wherePivot('mainTopic_id', $mainTopic->id )
                     ->wherePivot('package_id', $package->id)
                     ->sync($data_to_sync );

    return response()->json($results);

  }
}
