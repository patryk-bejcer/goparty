<?php

namespace App\Http\Controllers\Clubs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClubsUserController extends Controller
{

	public function __construct() {
		$this->middleware('auth', ['except' => ['index','show']]);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    echo 'clubs.user.index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    echo 'clubs.user.create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    echo 'clubs.user.show';
    }

}
