<?php

namespace App\Http\Controllers\Events;

use App\Models\Club;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsOwnerController extends Controller
{

	public function __construct() {

		/* Check if user has owner role*/
		$this->middleware( 'role:owner' );

	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $events = Event::where('user_id', Auth::id())->get();
	    return view('dashboard.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Club $club)
    {
	    $clubExists = Club::where([
		    'id' => $club->id,
		    'user_id' => Auth::id(),
	    ])->exists();

	    if(!$clubExists){
	    	echo 'nie jestes wlasicielem tego klubu...';
	    } else {
		    return view('dashboard.events.create', compact('club'));
	    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	    $clubExists = Club::where([
		    'id' => $request->club_id,
		    'user_id' => Auth::id(),
	    ])->exists();

	    if($clubExists){
		    Event::create($request->all());
		    return redirect()->route('club-events', ['club_id' => $request->club_id]);
	    } else {
	    	echo 'nie jestes wlascicielem tego klubu!';
	    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    echo 'owner.show.event';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    echo 'owner.edit.event';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
