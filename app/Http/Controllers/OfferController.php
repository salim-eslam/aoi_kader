<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $offers=Offer::all();
        return view('dashboard.offers.index',['offers'=>$offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oferr = new Offer();
        $oferr->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $oferr->value = $request->value;
        $oferr->status = $request->status;
        $oferr->save();
        return redirect()->route('offers.index')->with('Add','تم حفظ القسم بنجاح');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('dashboard.offers.edit',['offer'=>$offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $offer->title=['en' => $request->title_en, 'ar' =>$request->title_ar];
        $offer->value=$request->value;
        $offer->status=$request->status;
        $offer->update();
        return redirect()->route('offers.index')->with('edite','تم تعديل القسم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Offer::find($request->offer_id)->delete();
        return redirect()->route('offers.index')
                        ->with('delete','تم حذف التخفيض بنجاح');
    }
}
