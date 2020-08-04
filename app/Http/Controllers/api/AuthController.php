<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\AdminOP;
class AuthController extends Controller
{
	function __construct(){
		$this->middleware('jwt.verify');
	}
	function index($id){
		return response()->json(['user' => Auth::guard($id)->user()]);
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
	function updateadmin(Request $request, $id){
		if($id == Auth::guard('adminapi')->user()->id){
			$obj = AdminOP::findOrFail($id);
			$user = array( "name" => $request->name,
			  		  "email" => $request->email,
			);
			if(trim($request->password) != "") $user["password"] = bcrypt($request->password);
			$obj->update($user);
			$obj['role']=1;
			return response()->json(["user" => $obj]);
		}
		return response()->json([], 404);
	}
}
