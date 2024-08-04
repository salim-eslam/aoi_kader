<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use App\Models\Photo;

use App\Traits\SaveFile;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use SaveFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $products = Product::with(['department'])->get();
        return view('dashboard.products.index', ['products' => $products]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $categories = Category::all();
        return view('dashboard.products.create', ['categories' => $categories, 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = new Product();
        $finalImagePathName = $this->SaveImage('images/products/layout', $request->file('image'));
        if ($request->offerd) {
            $product->offerd = $request->offerd;
        }else{
            $product->offerd ='false';
        }
        if ($request->stocked) {
            $product->stocked = $request->stocked;
        }else{
            $product->stocked ='false';
        }
        $product->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $product->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $product->material = ['en' => $request->material_en, 'ar' => $request->material_ar];
        $product->seo_keywords = ['en' => $request->seo_keywords_en, 'ar' => $request->seo_keywords_ar];
        $product->seo_description = ['en' => $request->seo_description_en, 'ar' => $request->seo_description_ar];

        $product->code = $request->code;
        $product->length = $request->length;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->department_id = $request->department_id;
        $product->image = $finalImagePathName;
        $product->status = $request->status;
        $product->offer_price = $request->offer_price;
        // dd($product);
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd($product);
        $departments = Department::all();
        $categories = Category::all();
        return view('dashboard.products.edit', ['product' => $product, 'categories' => $categories, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
    {


        if ($request->offerd) {
            $product->offerd = $request->offerd;
        }else{
            $product->offerd ='false';
        }
        if ($request->stocked) {
            $product->stocked = $request->stocked;
        }else{
            $product->stocked ='false';
        }

        if ($request->hasFile('image')) {
            $finalImagePathName = $this->SaveImage('images/products/layout/', $request->file('image'));
            $product->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $product->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $product->material = ['en' => $request->material_en, 'ar' => $request->material_ar];
            $product->seo_Keywords = ['en' => $request->seo_keywords_en, 'ar' => $request->seo_keywords_ar];
            $product->seo_description = ['en' => $request->seo_description_en, 'ar' => $request->seo_description_ar];

            $product->code = $request->code;
            $product->length = $request->length;
            $product->width = $request->width;
            $product->height = $request->height;
            $product->department_id = $request->department_id;
            $product->image = $finalImagePathName;
            $product->status = $request->status;
            $product->offer_price = $request->offer_price;
            $product->update();
        } else {

            $product->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $product->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $product->material = ['en' => $request->material_en, 'ar' => $request->material_ar];
            $product->seo_keywords = ['en' => $request->seo_keywords_en, 'ar' => $request->seo_keywords_ar];
            $product->seo_description = ['en' => $request->seo_description_en, 'ar' => $request->seo_description_ar];

            $product->code = $request->code;
            $product->length = $request->length;
            $product->width = $request->width;
            $product->height = $request->height;
            $product->department_id = $request->department_id;
            $product->status = $request->status;
            $product->offer_price = $request->offer_price;
            $product->update();
        }
        return redirect()->route('products.index')->with('edit', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::find($request->product_id)->delete();
        return redirect()->route('products.index')
                        ->with('delete','تم حذف المنتج بنجاح'); //
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
        $request->validate([
            'photo'=>'required',
            'photo.*' => 'mimes:png,jpg,jpeg|max:1024'
        ]);
        $photoes=$request->file('photo');

        $product=Product::find($request->id);
        // dd($photoes);
        foreach ($photoes as $photo) {
            $finalImagePathName = $this->SaveImageCustomWidthandCustomHieght('images/products/attachments/', $photo,475,435);
           $product->photos()->create([
            'src'=> $finalImagePathName,
            'type'=>'image'
           ]);
        }
       return redirect()->back();

    }
}
