<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAbout;
use App\Http\Requests\UpdateAbout;
use App\Models\About;
use Illuminate\Http\Request;
use App\Traits\SaveFile;

class AboutController extends Controller
{
    use SaveFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts=About::all();
        return view('dashboard.abouts.index',['abouts'=>$abouts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.abouts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbout $request)
    {
        $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/abouts/',$request->file('image'),630,540);
        $about=new About();
        $about->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
        $about->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
        $about->image=$finalImagePathName;
        $about->status=$request->status;
        $about->save();
        return redirect()->route('abouts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
       return view('dashboard.abouts.edit',['about'=>$about]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbout $request, About $about)
    {
        if($request->hasFile('image')){
            $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/abouts/',$request->file('image'),630,540);

            $about->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $about->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
            $about->image=$finalImagePathName;
            $about->status=$request->status;
            $about->update();


         }else {

            $about->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $about->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
            $about->status=$request->status;
            $about->update();

         }
         return redirect()->route('abouts.index')->with('edite','تم تعديل العرض بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        About::find($request->about_id)->delete();
        return redirect()->route('abouts.index')
                        ->with('delete','تم حذف العرض بنجاح');
    }
}
