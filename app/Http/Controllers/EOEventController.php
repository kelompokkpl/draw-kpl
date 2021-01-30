<?php

namespace App\Http\Controllers;

use CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class EOEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'EO Panel: Event';
        $data['event'] = DB::table('event')->leftJoin('cms_users', 'event.cms_users_id', '=', 'cms_users.id')
                                           ->select('event.*', 'cms_users.name as user_name')
                                           ->where('event.cms_users_id', Session::get('admin_id'))
                                           ->whereNull('deleted_at')
                                           ->get();
        return view('event_organizer.event', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event_organizer.add_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        unset($request['_token']);
        $insert = DB::table('event')->insert($request->all());
        if($insert){
            // Handle notification
            $receiver = DB::table('cms_users')->whereIn('id_cms_privileges', [1, 3])->pluck('id');
            $config['content'] = "[New Event] '".ucfirst($request->name)."' has ben added!";
            $config['to'] = CRUDBooster::adminPath('event');
            $config['id_cms_users'] = $receiver; 
            CRUDBooster::sendNotification($config);

            //Redirect
            CRUDBooster::redirect(URL::to('eo/event'),"The event has been added! Please check your email to get the payment info","info");

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
        if(!DB::table('event')->where('cms_users_id',Session::get('admin_id'))->where('id', $id)->exists()){
            CRUDBooster::redirect(URL::to('eo/event'), "Hey! Event with id ".$id." is doesn't exist!","warning");
        }
        $data['page_title'] = 'EO Panel: Detail Event';
        $data['event'] = DB::table('event')->where('id', $id)->first();
        return view('event_organizer.detail_event', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!DB::table('event')->where('cms_users_id',Session::get('admin_id'))->where('id', $id)->exists()){
            CRUDBooster::redirect(URL::to('eo/event'), "Hey! Event with id ".$id." is doesn't exist!","warning");
        }
        $data['page_title'] = 'EO Panel: Edit Event';
        $data['event'] = DB::table('event')->where('id', $id)->first();
        return view('event_organizer.edit_event', $data);
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
    //     unset($request['_token'], $request['_method']);
    //     DB::table('event')->where('id', $id)->update($request->all());
            $bg_path = 'assets/uploads/background';
            $btn_path = 'assets/uploads/button';

            if($request->file('background_new_draw')!=''){
                $data['background_new_draw'] = Str::random(10).'.'.$request->file('background_new_draw')->getClientOriginalExtension();
                $request->file('background_new_draw')->move(public_path($bg_path), $data['background_new_draw']);
            }
            if($request->file('background_recent_draw')!=''){
                $data['background_recent_draw'] = Str::random(10).'.'.$request->file('background_recent_draw')->getClientOriginalExtension();
                $request->file('background_recent_draw')->move(public_path($bg_path), $data['background_recent_draw']);
            }
            if($request->file('background_draw_history')!=''){
                $data['background_draw_history'] = Str::random(10).'.'.$request->file('background_draw_history')->getClientOriginalExtension();
                $request->file('background_draw_history')->move(public_path($bg_path), $data['background_draw_history']);
            }
            if($request->file('button_image')!=''){
                $data['button_image'] = Str::random(10).'.'.$request->file('button_image')->getClientOriginalExtension();
                $request->file('button_image')->move(public_path($btn_path), $data['button_image']);
            }

            $request->validate([
                'global_text_color' => 'required',
                'hr_color' => 'required',
                'button_background_color' => 'required',
                'button_text_color' => 'required',
                'button_border_color' => 'required',
                'button_shadow_color' => 'required'
            ]);

            $data['global_text_color'] = $request->input('global_text_color');
            $data['hr_color'] = $request->input('hr_color');
            $data['button_background_color'] = $request->input('button_background_color');
            $data['button_text_color'] = $request->input('button_text_color');
            $data['button_border_color'] = $request->input('button_border_color');
            $data['button_shadow_color'] = $request->input('button_shadow_color');

            DB::table('event')->where('id', $id)->update($data);

        if(Str::contains(URL::previous(), 'dashboard_event/preferences')){
            CRUDBooster::redirect(URL::previous(),"Good job! The preferences success updated!","info");
        }
        CRUDBooster::redirect(URL::to('eo/event'),"Good job! The event success updated!","info");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!DB::table('event')->where('cms_users_id',Session::get('admin_id'))->where('id', $id)->exists()){
            CRUDBooster::redirect(URL::to('eo/event'), "Hey! Event with id ".$id." is doesn't exist!","warning");
        }
        DB::table('event')->where('id', $id)->update(['deleted_at'=>date('Y-m-d H:i:s')]);
        CRUDBooster::redirect(URL::to('eo/event'),"Good job! The event success deleted!","info");
    }

    public function dashboard($id)
    {
        if(!DB::table('event')->where('id', $id)->where('cms_users_id',Session::get('admin_id'))->exists()){
            CRUDBooster::redirect(URL::to('eo/event'), "Hey! Event with id ".$id." is doesn't exist or not active","warning");
        }

        $data['event'] = DB::table('event')->where('id', $id)->first();
        $data['participant'] = DB::table('participant')->where('event_id', $id)->get();
        $data['page_title'] = 'Dashboard '.$data['event']->name;

        Session::put('event_id', $id);
        Session::put('event_name', $data['event']->name);
        return view('event_organizer.event_dashboard', $data);
    }

    public function getPreferences(){
        if(Session::get('event_id')==''){
            CRUDBooster::redirect(URL::to('eo/event'), "Hey! You must select an event to be able to access the dashboard","warning");
        }
        $data['page_title'] = ucfirst(Session::get('event_name')).': Preferences';
        $data['event'] = DB::table('event')->where('id', Session::get('event_id'))->first();
        return view('event_organizer.preferences', $data);
    }
}
