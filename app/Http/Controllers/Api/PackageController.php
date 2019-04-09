<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\MainTopic;
use App\CustomMainTopicPackageSubTopic;
use App\Http\Resources\PackagesCollection;
use App\Http\Resources\PackageResource;


class PackageController extends ApiBaseController{

  public function index(){
    $authority=auth()->guard('api')->user();
    $packages= new PackagesCollection($authority->authority->packages);
    return $this->sendResponse($packages, 'Packages retrieved successfully.');

    // return response()->json(['data' => $authority], 200);
  }

  public function show(Package $package){
    $authorityApi=auth()->guard('api')->user();

    if(!$authorityApi->authority->packages->contains('id', $package->id)){
      return $this->sendError('Package not available to you','',403);
    }

      $packageResource= new PackageResource($package);


    return $this->sendResponse($packageResource, 'Package retrieved successfully.');
  }
}
