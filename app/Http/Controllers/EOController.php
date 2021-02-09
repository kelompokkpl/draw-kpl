<?php

namespace App\Http\Controllers;

use CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use PDF;
use App\Imports\ParticipantImport;
use Maatwebsite\Excel\Facades\Excel;

class EOController extends Controller
{
    public function getLogin(){
    	return view('event_organizer.login');
    }

    public function getIndex(){
        $data['past'] = DB::table('event')
                    ->where('cms_users_id', Session::get('admin_id'))
                    ->where('date_end', '>', date('Y-m-d'))
                    ->count();
        $data['event'] = DB::table('event')
                            ->where('cms_users_id', Session::get('admin_id'))
                            ->count();
        $data['upcoming'] = $data['event'] - $data['past'];
        $paid = DB::table('event')
                ->where('cms_users_id', Session::get('admin_id'))
                ->where('payment_status', 'Paid')
                ->count();
        $data['payment'] = ['paid' => $paid,
                            'unpaid' => $data['event'] - $paid 
                           ];
    	return view('event_organizer.index', $data);
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
        $data['profile'] = DB::table('cms_users')
                            ->where('id', Session::get('admin_id'))
                            ->first();
        return view('event_organizer.profile', $data);
    }

    public function updateProfile(Request $request){
        unset($request['_token']);

        if($request->file('photo')!=''){
            $name = Str::random(10).'.'.$request->file('photo')->getClientOriginalExtension();
            $path = 'uploads/'.Session::get('admin_id').'/'.date('Y-m');
            $pathh = 'app/uploads/'.Session::get('admin_id').'/'.date('Y-m');
            $data['photo'] = $path.'/'.$name;
            $str = str_replace('\\', '/', URL::to(''));
            $request->file('photo')->move(storage_path($pathh), $name);
            Session::put('admin_photo', $str.'/'.$path.'/'.$name);
        }
        if($request->password!=''){
            $data['password'] = Hash::make($request->password);
        }
        // dd($request->all());
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        // dd($data);
        DB::table('cms_users')->where('id', Session::get('admin_id'))->update($data);
        Session::put('admin_name', $request->name);
        CRUDBooster::redirect(URL::to('eo/profile'), "Hey! your profile success updated!","success");
    }

    public function sendmail(){
        $event = DB::table('event')->select('code_invoice')->where('code_invoice', 'like', $code.'%')->orderBy('code_invoice', 'desc')->first();
        $code = date('Ym').str_pad(intval(substr($event->code_invoice, 7))+1, 4, '0', STR_PAD_LEFT);
        $user = Db::table('cms_users')->where('id', Session::get('admin_id'))->select('email')->first();
            $data['email'] = $user->email;
            $data['name'] = Session::get('admin_name');
            $data['code'] = $code;
            $data['date'] = date('F d, Y');
            $data['due'] = date('F d, Y', strtotime("+1 week"));
            $data['event_name'] = 'name';
        Mail::send('mail.invoice', $data, function($message) {
            $message->to('mutiarahardiani17@gmail.com', Session::get('admin_name'))
                    ->subject('Invoice from Draw System');
            $message->from('mutiarahardiani17@gmail.com', 'Draw System');

        });

        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        } else{
            return response()->json('Yes, You have sent email to GMAIL from LARAVEL !!');
        }
    }

    public function printPDF(){
        $data = [
          'title' => 'First PDF for Medium',
          'heading' => 'Hello from 99Points.info',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'        
            ];
        
        $pdf = PDF::loadView('pdf_view', $data);  
        return $pdf->stream('medium.pdf', array('Attachment'=>false));
    }

    public function import(){
        Excel::import(new ParticipantImport, 'part.xlsx');
    }

}
