<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMedia;
use App\Traits\SaveFile;

class MediaController extends Controller
{
    use SaveFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $medias=Media::all();
        return view('dashboard.medias.index',['medias'=>$medias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.medias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedia $request)
    {
        if ($request->hasFile('file')) {
            $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/media/',$request->file('file'),630,540);
            $media=new Media();
            $media->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $media->type=$request->type;
            $media->file=$finalImagePathName;
            $media->status=$request->status;
            $media->save();
        }else{
            $media=new Media();
            $media->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $media->type=$request->type;
            $media->file=$request->file;
            $media->status=$request->status;
            $media->save();
        }

        return redirect()->route('medias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        return view('dashboard.medias.edit',['media'=>$media]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        // dd($request);
        if($request->hasFile('file')){
            $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/media/',$request->file('file'),630,540);
            $media->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $media->file=$finalImagePathName;
            $media->type=$request->type;
            $media->status=$request->status;
            $media->update();
         }else {
            if ($request->type=="video") {
                $media->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
                $media->file=$request->file;
                $media->type=$request->type;
                $media->status=$request->status;
                $media->update();
            }else {
                $media->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
                $media->type=$request->type;
                $media->status=$request->status;
                $media->update();
            }

         }
        return redirect()->route('medias.index')->with('edite','تم تعديل العرض بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Media::find($request->media_id)->delete();
        return redirect()->route('medias.index')
                        ->with('delete','تم حذف العرض بنجاح');
    }
}
