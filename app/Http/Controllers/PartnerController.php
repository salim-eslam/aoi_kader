<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Traits\SaveFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use SaveFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view(
            'dashboard.partners.index',
            [
                'partners'=>$partners

            ]
        );    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request to ensure 'image' is present and is a file
    $request->validate([
        'image' => 'nullable|file|image|max:2048', // max:2048 specifies the maximum file size in kilobytes
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
    ]);
    $finalImagePathName = $this->SaveImage('images/partners', $request->file('image'));

    $partner = new Partner();
    $partner->title = [
        'en' => $request->input('title_en'),
        'ar' => $request->input('title_ar'),
    ];
    $partner->image = $finalImagePathName;
    $partner->status=$request->status;
    $partner->save();

    return redirect()->route('partners.index')->with('success','Partner created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $partner = Partner::find($id);
        return view('dashboard.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $partner = Partner::find($id);
        return view('dashboard.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the partner by ID
        $partner = Partner::find($id);
        $request->validate([
            'image' => 'nullable|file|image|max:2048', // max:2048 specifies the maximum file size in kilobytes
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
        ]);

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            $finalImagePathName = $this->saveImage('images/partners/', $request->file('image'));

            // Delete the old image if it exists
            if ($partner->image && file_exists(public_path('images/partners/' . $partner->image))) {
                unlink(public_path('images/partners/' . $partner->image));
            }

            $partner->image = $finalImagePathName;
        }
        $partner->title = [
            'en' => $request->input('title_en'),
            'ar' => $request->input('title_ar'),
        ];
        $partner->status = $request->input('status');
        $partner->save();

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully');
    }

    /**
     * Saves the uploaded image and returns the file path.
     *
     * @param string $directory
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);

        // Delete the old image if it exists
        if ($partner->image && file_exists(public_path('images/partners/' . $partner->image))) {
            unlink(public_path('images/partners/' . $partner->image));
        }
        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }

}
