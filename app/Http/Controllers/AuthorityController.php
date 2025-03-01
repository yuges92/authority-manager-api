<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Authority;
use App\AuthorityApi;
use App\Package;

class AuthorityController extends Controller
{
  public function index()
  {
    // $authorities =Authority::all();
    $authorities =AuthorityApi::with('authority')->get();

    $title='Authority API Accounts';
    return view('authority.index', compact('title', 'authorities'));

  }

  public function create()
  {
    $title='New Authority Api Account';
    $packages=Package::all();
    $authorities =Authority::all();

    return view('authority.create', compact('title', 'packages', 'authorities'));
  }

  public function show(Authority $authority)
  {

    $title=$authority->full_name;
    $packages=Package::all();

    return view('authority.show', compact('title', 'authority', 'packages'));
  }
}
