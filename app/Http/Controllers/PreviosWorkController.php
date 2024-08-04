<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreviosWork;
use App\Http\Requests\UpdatePreviosWork;
use App\Models\PreviosWork;
use App\Models\Photo;

use App\Traits\SaveFile;
use Illuminate\Http\Request;

class PreviosWorkController extends Controller
{
    use SaveFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:previosWork-list|previosWork-create|previosWork-edit|previosWork-delete', ['only' => ['index','store']]);
         $this->middleware('permission:previosWork-create', ['only' => ['create','store']]);
         $this->middleware('permission:previosWork-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:previosWork-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $previos_works=PreviosWork::all();
        // dd($previos_works);
        return view('dashboard.previos_work.index',['previos_works'=>$previos_works]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.previos_work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreviosWork $request)
    {
        $finalImagePathName = $this->SaveImage('images/previos_work/layout/',$request->file('image'));
        $previos_work = new PreviosWork();
        $previos_work->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $previos_work->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $previos_work->body = ['en' => $request->body_en, 'ar' => $request->body_ar];
        $previos_work->seo_keywords = ['en' => $request->seo_keywords_en, 'ar' => $request->seo_keywords_ar];
        $previos_work->seo_description = ['en' => $request->seo_description_en, 'ar' => $request->seo_description_ar];

        $previos_work->status = $request->status;
        $previos_work->image=$finalImagePathName;
        $previos_work->save();
        return redirect()->route('previos_works.index')->with('Add','تم حفظ العمل بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreviosWork  $previosWork
     * @return \Illuminate\Http\Response
     */
    public function show(PreviosWork $previosWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreviosWork  $previosWork
     * @return \Illuminate\Http\Response
     */
    public function edit(PreviosWork $previos_work)
    {
        return view('dashboard.previos_work.edit',['previos_work'=>$previos_work]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreviosWork  $previosWork
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreviosWork $request, PreviosWork $previos_work)
    {
        if($request->hasFile('image')){
            $finalImagePathName = $this->SaveImage('images/previos_work/layout/',$request->file('image'));

            $previos_work->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $previos_work->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $previos_work->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
            $previos_work->seo_keywords = ['en' => $request->seo_keywords_en, 'ar' => $request->seo_keywords_ar];
            $previos_work->seo_description = ['en' => $request->seo_description_en, 'ar' => $request->seo_description_ar];

            $previos_work->image=$finalImagePathName;
            $previos_work->status=$request->status;
            $previos_work->update();


         }else {

            $previos_work->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $previos_work->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $previos_work->body=['en' => $request->body_en, 'ar' =>$request->body_ar];
            $previos_work->status=$request->status;
            $previos_work->seo_keywords = ['en' => $request->seo_keywords_en, 'ar' => $request->seo_keywords_ar];
            $previos_work->seo_description = ['en' => $request->seo_description_en, 'ar' => $request->seo_description_ar];

            $previos_work->update();

         }
         return redirect()->route('previos_works.index')->with('edite','تم تعديل العرض بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreviosWork  $previosWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        PreviosWork::find($request->previos_work_id)->delete();
        return redirect()->route('previos_works.index')
                        ->with('delete','تم حذف القسم بنجاح');

    }
    public function destroy_photo(Request $request)
    {
        //
        // dd($request);
        Photo::find($request->photo_id)->delete();
        return redirect()->back();
    }
    public function saveAttachmentPhotos(Request $request)
    {
        // $request->validate([
        //     'photo' => 'required|mimes:png,jpg,jpeg|max:1024'
        // ]);
        $request->validate([
            'photo'=>'required',
            'photo.*' => 'mimes:png,jpg,jpeg|max:1024'
        ]);
        $photoes=$request->file('photo');
        $previos_work=PreviosWork::find($request->id);
        // dd($photoes);
        foreach ($photoes as $photo) {
            $finalImagePathName= $this->SaveImage('images/previos_work/attachments', $photo);

            $previos_work->photos()->create([
            'src'=> $finalImagePathName,
            'type'=>'image'
           ]);
        }
       return redirect()->back();

    }
}
