<?php

namespace App\Http\Controllers;

use CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EOController extends Controller
{
    public function getLogin(){
    	return view('event_organizer.login');
    }

    public function getIndex(){
    	return view('event_organizer.index');
    }

    public function getLockScreen(){
    	if (! CRUDBooster::myId()) {
            Session::flush();

            return redirect()->route('getLogin')->with('message', cbLang('alert_session_expired'));
        }

        Session::put('admin_lock', 1);

        return view('crudbooster::lockscreen');
    }

    public function getProfile(){
        
    }

}
