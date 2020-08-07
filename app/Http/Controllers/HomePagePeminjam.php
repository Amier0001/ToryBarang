<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePagePeminjam extends Controller
{
    public function __construct()
    {
        $this->middleware('peminjam');
    }
	public function index()
    {
        return view('home-peminjam');
    }
}
