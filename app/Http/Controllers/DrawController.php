<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function getIndex(){
    	return view('draw_layout.index');
    }
}
