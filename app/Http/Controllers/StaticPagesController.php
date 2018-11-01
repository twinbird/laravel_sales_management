<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
	public function rootPage(Request $request) {
		if (Auth::check() === true) {
			return redirect()->route('estimates.index');
		} else {
			return view('welcome');
		}
	}
}
