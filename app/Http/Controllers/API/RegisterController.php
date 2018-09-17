<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use JWTFactory;
use JWTAuth;


class RegisterController extends Controller
{
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|string|email|max:255|unique:users',
			'password'=> 'required'
		]);
		if ($validator->fails()) {
			return response()->json($validator->errors());
		}
		User::create([
			'first_name' => $request->get('first_name'),
			'last_name' => $request->get('last_name'),
			'email' => $request->get('email'),
			'password' => bcrypt($request->get('password')),
		]);
		$user = User::first();
		$token = JWTAuth::fromUser($user);

		return Response::json(compact('token'));
	}
}