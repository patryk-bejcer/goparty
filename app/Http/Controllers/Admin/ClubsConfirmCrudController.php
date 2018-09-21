<?php

namespace App\Http\Controllers\Admin;

use App\Club;
use App\Events\ClubConfirm;
use App\Notifications\Clubs\ClubConfirm as ClubConfirmNotification;
use App\Http\Requests\ClubRequest as StoreRequest;
use App\Http\Requests\ClubRequest as UpdateRequest;
use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation

class ClubsConfirmCrudController extends CrudController {
	public function setup() {

		/*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->crud->setModel( 'App\Club' );
		$this->crud->setRoute( config( 'backpack.base.route_prefix' ) . '/clubs-confirm' );
		$this->crud->setEntityNameStrings( 'club', 'clubs' );

		/*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

		$this->crud->setFromDb();

		$this->crud->setColumns( [

			[
				'name'  => 'official_name',
				'label' => trans( 'Official name' ),
				'type'  => 'text',
			],

			[
				'label'     => "User email",
				'type'      => 'select',
				'name'      => 'user_id', // the db column for the foreign key
				'entity'    => 'user', // the method that defines the relationship in your Model
				'attribute' => 'email', // foreign key attribute that is shown to user
				'model'     => "App\User" // foreign key model
			],

			[
				'name'  => 'email',
				'label' => trans( 'Club email' ),
				'type'  => 'text',
			],

			[
				'name'  => 'phone',
				'label' => trans( 'Club phone' ),
				'type'  => 'text',
			],

			[
				'name'  => 'active',
				'label' => trans( 'Is active' ),
				'type'  => 'boolean',
			],


		] );


		// Fields
		$this->crud->addFields( [
			[
				'label'     => "User",
				'type'      => 'select',
				'name'      => 'user_id', // the db column for the foreign key
				'entity'    => 'user', // the method that defines the relationship in your Model
				'attribute' => 'email', // foreign key attribute that is shown to user
				'model'     => "App\User" // foreign key model
			],

		] );

		$this->crud->addButtonFromModelFunction( 'line', 'Confirm', 'confirmClubBtn', 'end' );

		$this->crud->addClause( 'where', 'active', '==', 0 );
	}

	public function store( StoreRequest $request ) {
		// your additional operations before save here
		$redirect_location = parent::storeCrud( $request );
		// your additional operations after save here
		// use $this->data['entry'] or $this->crud->entry
		return $redirect_location;
	}

	public function update( UpdateRequest $request ) {
		// your additional operations before save here
		$redirect_location = parent::updateCrud( $request );
		// your additional operations after save here
		// use $this->data['entry'] or $this->crud->entry
		return $redirect_location;
	}

	public function confirmClub( Request $request ) {

		$club = Club::findOrFail( $request->input( 'clubId' ) );
		$club->update( [ 'active' => true ] );
		User::findOrFail( $club->user_id )->notify( new ClubConfirmNotification( $club ) );
		event( new ClubConfirm( $club ) );

		return back();
	}
}
