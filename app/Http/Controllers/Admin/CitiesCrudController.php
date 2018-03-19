<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CityRequest as StoreRequest;
use App\Http\Requests\CityRequest as UpdateRequest;


class CitiesCrudController extends CrudController {

	public function setup()
	{
		$this->crud->setModel("App\Models\City");
		$this->crud->setRoute("admin/cities");
		$this->crud->setEntityNameStrings('city', 'cities');

		// Columns.
		$this->crud->setColumns([
			[
				'name'  => 'name',
				'label' => trans('Name'),
				'type'  => 'text',
			],
			[
				'label' => "Voivodeship",
				'type' => 'select',
				'name' => 'voivodeship_id', // the db column for the foreign key
				'entity' => 'voivodeship', // the method that defines the relationship in your Model
				'attribute' => 'name', // foreign key attribute that is shown to user
				'model' => "App\Models\Voivodeship" // foreign key model
			],
		]);

		$this->crud->addFields([
			[
				'name'  => 'name',
				'label' => trans('Name'),
				'type'  => 'text',
			],
			[
				'label' => "Voivodeship",
				'type' => 'select',
				'name' => 'voivodeship_id', // the db column for the foreign key
				'entity' => 'voivodeship', // the method that defines the relationship in your Model
				'attribute' => 'name', // foreign key attribute that is shown to user
				'model' => "App\Models\Voivodeship" // foreign key model
			],
		]);

	}



	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
