<?php

namespace App\Http\Controllers\Events;

use App\Models\Club;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsOwnerController extends Controller {

	public function __construct() {

		/* Check if user has owner role*/
		$this->middleware( 'role:owner' );

		$this->middleware( 'event_permission', [ 'except' => [ 'index' ] ] );

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$events = Event::with( 'club' )->where( 'user_id', Auth::id() )->get();

		return view( 'dashboard.events.index', compact( 'events' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param Club $club
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create( Club $club ) {
		return view( 'dashboard.events.create', compact( 'club' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {


		if($request->file('event_img')){
			$imageName = time().'.'.$request->file('event_img')->getClientOriginalExtension();
			$request->file('event_img')->move(public_path('uploads/events'), $imageName);
		} else {
			$imageName = null;
		}

        $request->validate([
            'title' => 'required|max:60',
            'start_date' => 'required',
            'selection' => 'required',
            'description' => 'required'
        ]);

		Event::create( [
            'club_id' => $request->club_id ,
            'user_id' => $request->user_id ,
            'title' => $request->title,
            'start_date' => strtotime($request->start_date),
            'admission' => $request->admission,
            'selection' => $request->selection,
            'ticket_price' => $request->ticket_price,
            'description' => $request->description,
            'website' => $request->website,
            'event_img' => $imageName
        ]);

//		dd($request);

		return redirect()->route( 'club-events', [ 'club_id' => $request->club_id ] );
	}

	/**
	 * Display the specified resource.
	 *
	 * @return void
	 */
	public function show() {
		echo 'owner.show.event';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Club $club
	 * @param Event $event
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Club $club, Event $event ) {
		return view( 'dashboard.events.edit', compact( 'event', 'club' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Event $event
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( $eventId, Request $request ) {

        $request->validate([
            'title' => 'required|max:60',
            'start_date' => 'required',
            'selection' => 'required',
            'description' => 'required'
        ]);

	    $event = Event::findOrFail($eventId);

		$event->update( [
            'club_id' => $request->club_id ,
            'user_id' => $request->user_id ,
            'title' => $request->title,
            'start_date' => strtotime($request->start_date),
            'admission' => $request->admission,
            'selection' => $request->selection,
            'ticket_price' => $request->ticket_price,
            'description' => $request->description,
            'website' => $request->website,
            'event_img' => $request->event_img
        ]);

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return void
	 */
	public function destroy( $id ) {
		//
	}
}
