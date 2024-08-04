<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatalog;
use App\Http\Requests\UpdateCatalog;
use App\Models\Catalog;
use App\Traits\SaveFile;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    use SaveFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:catalog-list|catalog-create|catalog-edit|catalog-delete', ['only' => ['index','store']]);
         $this->middleware('permission:catalog-create', ['only' => ['create','store']]);
         $this->middleware('permission:catalog-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:catalog-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $cataloges=Catalog::all();
        return view('dashboard.catalogs.index',['cataloges'=>$cataloges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.catalogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatalog $request)
    {
        $finalFilePathName = $this->SaveFile('files/cataloges',$request->file('file'));
        $catalog=new Catalog();
        $catalog->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
        $catalog->file=$finalFilePathName;
        $catalog->status=$request->status;
        $catalog->save();
        return redirect()->route('cataloges.index')->with('Add','تم حفظ الكتالوج بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $cataloge)
    {
            return view('dashboard.catalogs.edit',['catalog'=>$cataloge]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatalog $request, Catalog $cataloge)
    {
        if($request->hasFile('file')){
            $finalFilePathName =$this->SaveFile('files/cataloges',$request->file('file'));

            $cataloge->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $cataloge->file=$finalFilePathName;
            $cataloge->status=$request->status;
            $cataloge->update();


         }else {

            $cataloge->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
            $cataloge->status=$request->status;
            $cataloge->update();

         }
         return redirect()->route('cataloges.index')->with('edite','تم تعديل الكتالوج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Catalog::find($request->catalog_id)->delete();
        return redirect()->route('cataloges.index')
                        ->with('delete','تم حذف الكتالوج بنجاح');
    }
}
