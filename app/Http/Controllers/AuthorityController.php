<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function index()
    {
      $title='Authorities';
      return view('authority.authorities', compact('title'));

    }

    public function create()
    {
      $title='New Authority';

        return view('authority.createAuthority', compact('title'));
    }

    public function show($authority)
    {

      $title='New Authority';

        return view('authority.showAuthority', compact('title'));
    }
}
