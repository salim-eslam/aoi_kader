<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Traits\SaveFile;

class TeamController extends Controller
{
    use SaveFile;

    function __construct()
    {
         $this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index','store']]);
         $this->middleware('permission:team-create', ['only' => ['create','store']]);
         $this->middleware('permission:team-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::all();
        return view('dashboard.teams.index',['teams'=>$teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request);
        $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/teams/',$request->file('image'),165,165);
        $team=new Team();
        $team->name=['en' => $request->name_en, 'ar' =>$request->name_ar];
        $team->image=$finalImagePathName;
        $team->status=$request->status;
        $team->save();
        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit',['team'=>$team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        // dd($request);
        if($request->hasFile('image')){
            $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/teams/',$request->file('image'),165,165);

            $team->name=['en' => $request->name_en, 'ar' =>$request->name_ar];
            $team->image=$finalImagePathName;
            $team->status=$request->status;
            $team->update();


         }else {

            $team->name=['en' => $request->name_en, 'ar' =>$request->name_ar];
            $team->status=$request->status;
            $team->update();

         }
         return redirect()->route('teams.index')->with('edite','تم تعديل العضو بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        // dd($request);
        Team::find($request->team_id)->delete();
        return redirect()->route('teams.index')
                        ->with('delete','تم حذف المنتج بنجاح'); //
    }
}
