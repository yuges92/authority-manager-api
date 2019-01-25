<?php

namespace App\Http\Controllers;

use App\Package;
use App\MainTopic;
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
    return view('sara-packages.createPackage', compact('title', 'mainTopics'));
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
      'name' => 'required|unique:AS_packages,name',
      'type' => 'required',
    ]);

    $package = new Package();
    $package->name=$request->input('name');
    $package->description=$request->input('description');
    $package->type=$request->input('type');
    $package->isActive=1;
    $package->save();
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
    return view('sara-packages.show', compact('package'));
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Package  $package
  * @return \Illuminate\Http\Response
  */
  public function destroy(Package $package)
  {
    //
  }
}
