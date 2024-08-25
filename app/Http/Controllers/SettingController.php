<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('dashboard.settings.index', ['settings' => $settings]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.settings.create');
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
            'site_email' => 'required|email',
            'site_phone' => 'required',
            'site_address' => 'required',
            'site_fax' => 'required',
            'site_map' => 'required',
            'site_facebook' => 'required',
            'site_youtube' => 'required',
        ]);
        $setting=new Setting();
        $setting->site_email=$request->site_email;
        $setting->site_phone=$request->site_phone;
        $setting->site_address=$request->site_address;
        $setting->site_fax=$request->site_fax;
        $setting->site_map=$request->site_map;
        $setting->site_facebook=$request->site_facebook;
        $setting->site_youtube=$request->site_youtube;
        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('dashboard.settings.edit', compact('setting'));
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
        $request->validate([
            'site_email' =>'required|email',
            'site_phone' =>'required',
            'site_address' =>'required',
            'site_fax' =>'required',
            'site_map' =>'required',
            'site_facebook' =>'required',
            'site_youtube' =>'required',
        ]);
        $setting=Setting::find($id);
        $setting->site_email=$request->site_email;
        $setting->site_phone=$request->site_phone;
        $setting->site_address=$request->site_address;
        $setting->site_fax=$request->site_fax;
        $setting->site_map=$request->site_map;
        $setting->site_facebook=$request->site_facebook;
        $setting->site_youtube=$request->site_youtube;
        $setting->save();

        return redirect()->route('settings.index')->with('success','settings updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting=Setting::find($id);
        $setting->delete();

        return redirect()->route('settings.index')->with('delete','settings deleted successfully');
    }
}
