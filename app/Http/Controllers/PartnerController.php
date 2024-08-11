<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
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
        'image' => 'required|file|image|max:2048', // max:2048 specifies the maximum file size in kilobytes
    ]);

    // Get the uploaded file
    $image = $request->file('image');

    // Generate a unique filename with a random prefix and original name
    $imageName = Str::random(10) . '-' . $image->getClientOriginalName();

    // Move the image to the public/uploads/partners directory
    $image->move(public_path('images/partners'), $imageName);

    // Save the image name to the database
    $partner = new Partner(); // Assuming you are creating a new Partner instance

    $partner->title = [
        'en' => $request->input('title_en'),
        'ar' => $request->input('title_ar'),
    ];

    $partner->image = $imageName;

    $partner->status=$request->status;
    // Save the partner record to the database
    $partner->save();

    // Optionally, you can return a response or redirect

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
    $partner = Partner::find($id);

    // Validate the request to ensure 'image' is present and is a file
    $request->validate([
        'image' => 'nullable|file|image|max:2048', // max:2048 specifies the maximum file size in kilobytes
    ]);

    // If a new image is uploaded
    if ($request->hasFile('image')) {
        // Get the uploaded file
        $image = $request->file('image');

        // Generate a unique filename with a random prefix and original name
        $imageName = Str::random(10) . '-' . $image->getClientOriginalName();

        // Move the image to the public/uploads/partners directory
        $image->move(public_path('images/partners'), $imageName);

        // Delete the old image if it exists
        if ($partner->image && file_exists(public_path('images/partners/' . $partner->image))) {
            unlink(public_path('images/partners/' . $partner->image));
        }

        // Save the new image name to the database
        $partner->image = $imageName;
    }

    // Update the title with multilingual support (ensure you have set up the translatable package)
    $partner->title = [
        'en' => $request->input('title_en'),
        'ar' => $request->input('title_ar'),
    ];

    // Update the status
    $partner->status = $request->input('status');

    // Save the changes to the database
    $partner->save();

    // Optionally, you can return a response or redirect
    return redirect()->route('partners.index')->with('success', 'Partner updated successfully');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the partner by ID
        $partner = Partner::find($id);

        // Check if the partner exists before attempting to delete
        // if (!$partner) {
        //     return redirect()->route('partners.index')->with('error', 'Partner not found.');
        // }

        // Delete the image if it exists
        if ($partner->image && file_exists(public_path('images/partners/' . $partner->image))) {
            unlink(public_path('images/partners/' . $partner->image));
        }

        // Delete the partner record from the database
        $partner->delete();

        // Redirect with success message
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }

}
