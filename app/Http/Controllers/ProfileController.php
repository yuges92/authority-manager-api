<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('profile.index');
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
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function updatePassword(Request $request)
  {
    $this->validate($request,[
      'currentPassword' => 'required',
      'password' => 'required|string|min:6|confirmed',
    ]);
    if (!(Hash::check($request->get('currentPassword'), Auth::user()->password))) {
          // The passwords matches
          return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
      }
      if(strcmp($request->get('currentPassword'), $request->get('password')) == 0){
          //Current password and new password are same
          return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
      }
      $user = $request->user();
      $user->password = Hash::make($request->get('password'));
      $user->save();
      return redirect()->back()->with("success","Password changed successfully !");
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
