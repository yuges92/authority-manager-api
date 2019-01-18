<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Authority;
use App\Package;

class AuthorityController extends Controller
{
  public function index()
  {
    $authorities =Authority::all();
    $title='Authorities';
    return view('authority.index', compact('title', 'authorities'));

  }

  public function create()
  {
    $title='New Authority';
    $packages=Package::all();
    return view('authority.create', compact('title', 'packages'));
  }

  public function show(Authority $authority)
  {

    $title=$authority->full_name;

    return view('authority.show', compact('title', 'authority'));
  }
}
