<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;

class ReportController extends ApiBaseController
{
  public function allUsers()
  {
    // $authority=AuthorityApi::where('authority_id',1088)->get();
    $authority=auth()->guard('api')->user();
    // $authority->authority()->packages;
    // $package= new PackageResource($authority->authority->packages->first());
    $user=$authority->authority->users()->with('topics')->get();
    return $this->sendResponse($user, 'Packages retrieved successfully.');


  }
}
