<?php

namespace App\Http\Controllers;

use App\AuthorityApi;
use Illuminate\Http\Request;

class AuthorityApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

      // dd($request);
      $this->validate($request, [
        'authority_id' => 'required|unique:AS_api_authorities,authority_id',
        'username' => 'required|unique:AS_api_authorities,username',
        'password' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuthorityApi  $authorityApi
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorityApi $authorityApi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuthorityApi  $authorityApi
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorityApi $authorityApi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuthorityApi  $authorityApi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthorityApi $authorityApi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuthorityApi  $authorityApi
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorityApi $authorityApi)
    {
        //
    }
}
