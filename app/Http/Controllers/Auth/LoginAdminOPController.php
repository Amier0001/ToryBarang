<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAdminOP;

class LoginAdminOPController extends Controller
{
    //
	use AuthenticatesAdminOP;
	protected $redirectTo = '/admin';
}