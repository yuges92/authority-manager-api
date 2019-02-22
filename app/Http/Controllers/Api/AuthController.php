<?php

namespace App\Http\Controllers\Api;

use Mail;
use Auth;
use Hash;
use Validator;
use App\AuthorityApi;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;

class AuthController extends ApiBaseController
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // $authority=AuthorityApi::where('authority_id',1088)->get();
    $authority=auth()->guard('api')->user();
    // $authority->authority()->packages;
    $package= new PackageResource($authority->authority->packages->first());
    return $this->sendResponse($package, 'Packages retrieved successfully.');

    // return response()->json(['data' => $package], 200);
    // $data = array('name'=>"Virat Gandhi");
    // Mail::send('emails.reminder', $data, function ($m) {
    //   $m->from('noreply@dlfemail.org.uk', 'Your Application');
    //
    //   $m->to('sivayuges@gmail.com')->subject('Your Reminder!');
    // });

  }



  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function login(Request $request)
  {
    $rules= [
      'username'=>'required',
      'password'=>'required'
    ];
    $input= $request->only('username','password');
    $validator =Validator::make($input,$rules);
    if($validator->fails()){
      $error=$validator->messages();
      // return response()->json(['error' => $error], 401);
      return $this->sendError('error', $error,401);

    }

    $username = $request->input('username');
    $password = $request->input('password');
    $authorityApi=AuthorityApi::where('username', $username)->first();
    // dd($authorityApi);
    if($authorityApi){
      if(Hash::check($password, $authorityApi->password)){
        $accessToken=$authorityApi->createToken('AuthToken');
        // dd($accessToken);
        $token=$accessToken->accessToken;
        $expiryDate=$accessToken->token->expires_at;
        $response['access_token']=$token;
        $response['expires_at']=$expiryDate;
        // $response['message']='Token retrieved successfully';

        // return response()->json($response,200);
        return $this->sendResponse($response, 'Token retrieved successfully.');

      }
    }

    return $this->sendError('error', 'Invalid Credential',404);
    // return response()->json(['error' => 'Invalid Credential'], 401);

  }


}
