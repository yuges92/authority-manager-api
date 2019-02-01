<?php

namespace App\Http\Controllers;

use App\AuthorityApi;
use Illuminate\Http\Request;

class AuthorityApiController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    // dd($request);
    $this->validate($request, [
      'authority_id' => 'required|unique:AS_api_authorities,authority_id',
      'username' => 'required|unique:AS_api_authorities,username',
      'password' => 'required',
      'start_date' => 'required',
      'expiry_date' => 'required',
      'packages'  =>  'required'
    ]);

    $authorityApi= new AuthorityApi();
    $authorityApi->authority_id =$request->input('authority_id') ;
    $authorityApi->username = $request->input('username');
    $authorityApi->password = $request->input('password');
    $authorityApi->start_date = $request->input('start_date');
    $authorityApi->expiry_date = $request->input('expiry_date');
    $authorityApi->isActive =1 ;
    // dd($authorityApi);
    $authorityApi->save();
    $authorityApi->authority->packages()->attach($request->input('packages'));
    return redirect()->route('authorities.index')->with('success', 'Api Account Created');

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\AuthorityApi  $authorityApi
  * @return \Illuminate\Http\Response
  */
  public function show(AuthorityApi $authorityApi)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\AuthorityApi  $authorityApi
  * @return \Illuminate\Http\Response
  */
  public function edit(AuthorityApi $authorityApi)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\AuthorityApi  $authorityApi
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, AuthorityApi $authorityApi)
  {
    $this->validate($request, [
      'username' => 'required',
      'start_date' => 'required',
      'expiry_date' => 'required',
    ]);
    $authorityApi->username = $request->input('username');
    $authorityApi->start_date = $request->input('start_date');
    $authorityApi->expiry_date = $request->input('expiry_date');
    $authorityApi->isActive =$request->input('isActive') ? 1:0 ;
    $authorityApi->update();

    return redirect()->back()->with('success', 'Api Account Updated');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\AuthorityApi  $authorityApi
  * @return \Illuminate\Http\Response
  */
  public function destroy(AuthorityApi $authorityApi)
  {
  $authorityApi->delete();
  return redirect()->back()->with('success', 'Api Account Deleted');
  }
}
