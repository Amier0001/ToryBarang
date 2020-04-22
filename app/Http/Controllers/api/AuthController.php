<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\User;
class AuthController extends Controller
{
	function __construct(){
		$this->middleware('jwt.verify');
	}
	function index(){
		return response()->json(['user' => Auth::guard('api')->user()]);
	}
	function update(Request $request, $id){
		if($id == Auth::guard('api')->user()->id){
			$obj = User::findOrFail($id);
			$user = array( "name" => $request->name,
			  		  "email" => $request->email,
			);
			if(trim($request->password) != "") $user["password"] = bcrypt($request->password);
			$obj->update($user);
			$obj['role']=2;
			return response()->json(["user" => $obj]);
		}
		return response()->json([], 404);
	}
}
