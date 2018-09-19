<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest;
use App\Http\Requests\UserStoreCrudRequest as StoreRequest;
use App\Http\Requests\UserUpdateCrudRequest as UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class UserCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel(config('backpack.permissionmanager.user_model'));
        $this->crud->setEntityNameStrings(trans('backpack::permissionmanager.user'), trans('backpack::permissionmanager.users'));
        $this->crud->setRoute(config('backpack.base.route_prefix').'/user');
//        $this->crud->enableAjaxTable();
//	    $this->crud->addButtonFromModelFunction('line','sendEmail', 'sendEmailToUser', 'beginning');


        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'first_name',
                'label' => trans('First name'),
                'type'  => 'text',
            ],
	        [
		        'name'  => 'last_name',
		        'label' => trans('Last Name'),
		        'type'  => 'text',
	        ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],

	        [       // SelectMultiple = n-n relationship (with pivot table)
		        'label' => "Favorite music",
		        'type' => 'select_multiple',
		        'name' => 'favoriteMusic', // the method that defines the relationship in your Model
		        'entity' => 'favoriteMusic', // the method that defines the relationship in your Model
		        'attribute' => 'name', // foreign key attribute that is shown to user
		        'model' => "App\MusicType", // foreign key model
		        'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
	        ],
            [ // n-n relationship (with pivot table)
               'label'     => trans('backpack::permissionmanager.roles'), // Table column heading
               'type'      => 'select_multiple',
               'name'      => 'roles', // the method that defines the relationship in your Model
               'entity'    => 'roles', // the method that defines the relationship in your Model
               'attribute' => 'name', // foreign key attribute that is shown to user
               'model'     => config('laravel-permission.models.role'), // foreign key model
            ],
            [ // n-n relationship (with pivot table)
               'label'     => trans('backpack::permissionmanager.extra_permissions'), // Table column heading
               'type'      => 'select_multiple',
               'name'      => 'permissions', // the method that defines the relationship in your Model
               'entity'    => 'permissions', // the method that defines the relationship in your Model
               'attribute' => 'name', // foreign key attribute that is shown to user
               'model'     => config('laravel-permission.models.permission'), // foreign key model
            ],

        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'first_name',
                'label' => trans('First name'),
                'type'  => 'text',
            ],
	        [
		        'name'  => 'last_name',
		        'label' => trans('Last name'),
		        'type'  => 'text',
	        ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],

	        [       // SelectMultiple = n-n relationship (with pivot table)
		        'label' => "Favorite music",
		        'type' => 'select_multiple',
		        'name' => 'favoriteMusic', // the method that defines the relationship in your Model
		        'entity' => 'favoriteMusic', // the method that defines the relationship in your Model
		        'attribute' => 'name', // foreign key attribute that is shown to user
		        'model' => "App\MusicType", // foreign key model
		        'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
	        ],
            [
                'name'  => 'password',
                'label' => trans('backpack::permissionmanager.password'),
                'type'  => 'password',
            ],
            [
                'name'  => 'password_confirmation',
                'label' => trans('backpack::permissionmanager.password_confirmation'),
                'type'  => 'password',
            ],
            [
            // two interconnected entities
            'label'             => trans('backpack::permissionmanager.user_role_permission'),
            'field_unique_name' => 'user_role_permission',
            'type'              => 'checklist_dependency',
            'name'              => 'roles_and_permissions', // the methods that defines the relationship in your Model
            'subfields'         => [
                    'primary' => [
                        'label'            => trans('backpack::permissionmanager.roles'),
                        'name'             => 'roles', // the method that defines the relationship in your Model
                        'entity'           => 'roles', // the method that defines the relationship in your Model
                        'entity_secondary' => 'permissions', // the method that defines the relationship in your Model
                        'attribute'        => 'name', // foreign key attribute that is shown to user
                        'model'            => config('laravel-permission.models.role'), // foreign key model
                        'pivot'            => true, // on create&update, do you need to add/delete pivot table entries?]
                        'number_columns'   => 3, //can be 1,2,3,4,6
                    ],
                    'secondary' => [
                        'label'          => ucfirst(trans('backpack::permissionmanager.permission_singular')),
                        'name'           => 'permissions', // the method that defines the relationship in your Model
                        'entity'         => 'permissions', // the method that defines the relationship in your Model
                        'entity_primary' => 'roles', // the method that defines the relationship in your Model
                        'attribute'      => 'name', // foreign key attribute that is shown to user
                        'model'          => config('laravel-permission.models.permission'), // foreign key model
                        'pivot'          => true, // on create&update, do you need to add/delete pivot table entries?]
                        'number_columns' => 3, //can be 1,2,3,4,6
                    ],
                ],
            ],
        ]);
    }

    /**
     * Store a newly created resource in the database.
     *
     * @param StoreRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $this->handlePasswordInput($request);

        return parent::storeCrud($request);
    }

    /**
     * Update the specified resource in the database.
     *
     * @param UpdateRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
    {
        $this->handlePasswordInput($request);

        return parent::updateCrud($request);
    }

    /**
     * Handle password input fields.
     *
     * @param CrudRequest $request
     */
    protected function handlePasswordInput(CrudRequest $request)
    {
        // Remove fields not present on the user.
        $request->request->remove('password_confirmation');

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', bcrypt($request->input('password')));
        } else {
            $request->request->remove('password');
        }
    }

    public function getEmailForm(User $user){
		return view('vendor.backpack.base.users.email_to_user_form', compact('user'));
    }

	public function sendEmail($user_id, Request $request){


    	$user = User::findOrFail($user_id);
		$title = $request->input('title');
		$content = $request->input('content');

		Mail::send('emails.simple', ['user' => $user, 'title' => $title, 'content' => $content], function ($m) use ($user){
			$m->from(Auth::user()->email, 'goparty.pl');
			$m->to($user->email, $user->name)->subject('Nowa wiadomość od goparty.pl');
		});

		\Alert::success('Message has been send!')->flash();

		return redirect( url(config('backpack.base.route_prefix', 'admin') . '/user') );

	}
}
