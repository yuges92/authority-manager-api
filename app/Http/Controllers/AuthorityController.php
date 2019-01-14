<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Authority;

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

    return view('authority.create', compact('title'));
  }

  public function show(Authority $authority)
  {

    $title=$authority->full_name;

    return view('authority.show', compact('title', 'authority'));
  }
}
