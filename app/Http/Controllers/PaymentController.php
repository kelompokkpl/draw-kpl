<?php

namespace App\Http\Controllers;

use CRUDBooster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'EO Panel: Payment';
        $data['event'] = DB::table('event')->where('cms_users_id', Session::get('admin_id'))
                                           ->get();
        return view('event_organizer.payment', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event_organizer.add_payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                            'name' => 'required|max:100',
                            'nominal' => 'required',
                            'transfer_date' => 'required'
                          ]);

        $path = 'assets/uploads/payment';
        if($request->file('photo')!=''){
            $data['photo'] = Str::random(10).'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path($path), $data['photo']);
        }

        $data['name'] = $request->input('name');
        $data['transfer_date'] = $request->input('transfer_date');
        $data['nominal'] = $request->input('nominal');
        $data['event_id'] = $request->input('event_id');
        $data['created_at'] = Carbon::now()->timestamp;

        $insert = DB::table('payment')->insert($data);
        if($insert){
            DB::table('event')->where('id', $data['event_id'])->update(['payment_status' => 'Waiting for confirmation']);

            // Handle notification
            $receiver = DB::table('cms_users')->whereIn('id_cms_privileges', [1, 3])->pluck('id');
            $config['content'] = "[New Payment] '".ucfirst(Session::get('event_name'))."' has ben added!";
            $config['to'] = CRUDBooster::adminPath('payment');
            $config['id_cms_users'] = $receiver; 
            CRUDBooster::sendNotification($config);

            //Redirect
            CRUDBooster::redirect(URL::to('eo/payment'),"Yohoo! The payment has been saved. Wait until Administrator confirm your payment, so your event will be active","info");
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page_title'] = 'EO Panel: Detail Payment';
        $data['payment'] = DB::table('payment')->where('id', $id)->first();

        return view('event_organizer.detail_payment', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
