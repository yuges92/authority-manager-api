<?php

namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ApiBaseController;

class PackageController extends ApiBaseController
{
    public function index(Request $request, $authority)
    {
    return $this->sendResponse($authority, 'MainTopic retrieved successfully.');
        
    }
}
