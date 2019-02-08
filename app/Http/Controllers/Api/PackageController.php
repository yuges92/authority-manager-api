<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\MainTopic;
use App\CustomMainTopicPackageSubTopic;
use App\Http\Resources\PackagesCollection;

class PackageController extends ApiBaseController
{
    public function index()
    {
      $authority=auth()->guard('api')->user();
      $packages= new PackagesCollection($authority->authority->packages);
      return $this->sendResponse($packages, 'Packages retrieved successfully.');

      // return response()->json(['data' => $authority], 200);
    }
}
