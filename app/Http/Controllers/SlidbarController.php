<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlideBar;
use App\Http\Requests\UpdateSlideBar;
use App\Models\Slidbar;
use App\Traits\SaveFile;
use Illuminate\Http\Request;

class SlidbarController extends Controller
{
    use SaveFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:slidbar-list|slidbar-create|slidbar-edit|slidbar-delete', ['only' => ['index','store']]);
         $this->middleware('permission:slidbar-create', ['only' => ['create','store']]);
         $this->middleware('permission:slidbar-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:slidbar-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $images=Slidbar::all();
        return view('dashboard.slidbars.index',['images'=>$images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slidbars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlideBar $request)
    {
        $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/sliders/',$request->file('image'),630,540);
        $slidbar=new Slidbar();
        $slidbar->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
        $slidbar->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
        $slidbar->image=$finalImagePathName;
        $slidbar->status=$request->status;
        $slidbar->save();
        return redirect()->route('slidbars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slidbars  $slidbar
     * @return \Illuminate\Http\Response
     */
    public function show(Slidbar $slidbar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slidbars  $slidbars
     * @return \Illuminate\Http\Response
     */
    public function edit(Slidbar $slidbar)
    {
       return view('dashboard.slidbars.edit',['slidbar'=>$slidbar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slidbars  $slidbars
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlideBar $request, Slidbar $slidbar)
    {
        // $request->validate([
        //     'title_en'=>'required',
        //     'body'=>'required',
        // ]);
        if($request->hasFile('image')){
            $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/sliders/',$request->file('image'),630,540);

            $slidbar->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $slidbar->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
            $slidbar->image=$finalImagePathName;
            $slidbar->status=$request->status;
            $slidbar->update();


         }else {

            $slidbar->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $slidbar->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
            $slidbar->status=$request->status;
            $slidbar->update();

         }
         return redirect()->route('slidbars.index')->with('edite','تم تعديل العرض بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slidbar  $slidbar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Slidbar::find($request->slidbar_id)->delete();
        return redirect()->route('slidbars.index')
                        ->with('delete','تم حذف العرض بنجاح');
    }
}
