<?php

namespace App\Http\Controllers;

use MetaTag;
use App\Models\Team;
use App\Models\About;
use App\Models\Catalog;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Media;

// use PHPSTORM_META\type;
use App\Models\Slidbar;
use App\Mail\UserMessage;
use App\Models\Department;

use App\Models\PreviosWork;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessage;
use Maatwebsite\Excel\Concerns\ToArray;
// use Illuminate\Support\Facades\MailMETA\type;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slidbars = Slidbar::all();
        $partners=Partner::all();
        $setting=Setting::all();
        $products = Product::active()->paginate(8);
        // dd($products);
        return view(
            'Front.home',
            [
                'slidbars' => $slidbars,
                'products' => $products,
                'partners' => $partners,
                'setting'=>$setting
            ]
        );
    }
    public function contact()
    {
        MetaTag::set('title', '');
        MetaTag::set('description', 'مرحبًا بك في اتيكو، وجهتك الرئيسية للأثاث العصري والأنيق. نحن نقدم تشكيلة واسعة من الأثاث عالي الجودة والمصمم بعناية لتلبية احتياجات منزلك ومكتبك. اكتشف مجموعتنا المذهلة من الأثاث بتصاميم مبتكرة تجمع بين الأناقة والوظائف العملية.');
        MetaTag::set('image', asset('assets/front/img/logo/Logo_Arab.png'));

        return view('Front.contact_us');
    }
    public function product_show($id)
    {
        $ID = decrypt($id);
        $product = Product::active()->with(['photos', 'department'])->find($ID);
        $photos = Arr::pluck($product->photos, 'src');
        // dd($product);
            $photos[] = $product->image;
        // if (count($photos) % 2 != 0) {
        // }
        $related_product = Product::active()->where('department_id', '=', $product->department_id)->inRandomOrder()->limit(4)->get();
        // dd($related_product);
        $product->increment('views');
        if ($product->seo_description==null) {
            $product->seo_description=$product->name;
        }
        if ($product->seo_Keywords==null) {
            $product->seo_Keywords=$product->name;
        }
        // dd($product->getseo_description);
        MetaTag::set('description', 'مرحبًا بك في اتيكو، وجهتك الرئيسية للأثاث العصري والأنيق. نحن نقدم تشكيلة واسعة من الأثاث عالي الجودة والمصمم بعناية لتلبية احتياجات منزلك ومكتبك. اكتشف مجموعتنا المذهلة من الأثاث بتصاميم مبتكرة تجمع بين الأناقة والوظائف العملية.');
        MetaTag::set('image', asset('assets/front/img/logo/Logo_Arab.png'));
        MetaTag::set('product_description',$product->seo_description);
        MetaTag::set('product_keywords',$product->seo_keywords);
// dd($photos);
        return view('Front.product.singel_product', [
            'product' => $product,
            'photos' => $photos,
            'related_product' => $related_product
        ]);
    }

    public function product_department_filter($id){
        $ID = decrypt($id);
        $department=Department::find($ID);

        $products = Product::active()->with(['department'])->where('department_id',$ID)->paginate(3);
        // dd($products);
        return view('Front.product.product_filter', [
            'products' => $products,
            'department'=>$department
        ]);
    }
    public function product_sales_filter(){
        $products = Product::active()->offerd()->with(['department'])->paginate(12);
        return view('Front.product.product_sales', [
            'products' => $products,
        ]);
    }
    public function profile_projects(){
        $previos_works=PreviosWork::active()->get();
        return view('Front.profile.projects.projects',['previos_works'=>$previos_works]);
    }
    public function project_show($id){
        $ID = decrypt($id);
        $previos_work = PreviosWork::active()->with(['photos','comments_show'])->find($ID);
    //    dd($previos_work);
        $photos = Arr::pluck($previos_work->photos, 'src');
        if (count($photos) % 2 != 0) {
            $photos[] = $photos[0];
        }
        $previos_work->increment('views');
        if ($previos_work->seo_description==null) {
            $previos_work->seo_description=$previos_work->name;
        }
        if ($previos_work->seo_Keywords==null) {
            $previos_work->seo_Keywords=$previos_work->name;
        }
        // dd($previos_work->getseo_description);
        MetaTag::set('description', 'مرحبًا بك في اتيكو، وجهتك الرئيسية للأثاث العصري والأنيق. نحن نقدم تشكيلة واسعة من الأثاث عالي الجودة والمصمم بعناية لتلبية احتياجات منزلك ومكتبك. اكتشف مجموعتنا المذهلة من الأثاث بتصاميم مبتكرة تجمع بين الأناقة والوظائف العملية.');
        MetaTag::set('image', asset('assets/front/img/logo/Logo_Arab.png'));
        MetaTag::set('previos_work_description',$previos_work->seo_description);
        MetaTag::set('previos_work_keywords',$previos_work->seo_keywords);

        return view('Front.profile.projects.projects_detail',['previos_work'=>$previos_work,'photos'=>$photos]);

    }
    public function profile_cataloges(){
        $cataloges=Catalog::active()->get();
        return view('Front.profile.cataloges.cataloges',['cataloges'=>$cataloges]);
    }
     public function about()
    {
        $teams=Team::active()->get();
        $abouts=About::active()->get();
        return view('Front.about_us',[
            'teams'=>$teams,
            'abouts'=>$abouts
        ]);
    }

    public function media()
    {
        $medias=Media::active()->get();
        return view('Front.vedio_libray',[
            'medias'=>$medias
        ]);
    }

    public function search(Request $request){
        if($request->name==null){
        $products = Product::active()->with(['department'])->paginate(12);
        return view('Front.product.product_sales', [
            'products' => $products,
        ]);
     }


        $products = Product::active()->with(['department'])->where(function ($query) use ($request) {
            $query->where('name->en','LIKE', '%'.$request->name.'%')
            ->orWhere('name->ar','LIKE', '%'.$request->name.'%');
        })->paginate(12);
        return view('Front.product.product_sales', [
            'products' => $products,
        ]);

    }
    public function product_instock_filter(){
        $products = Product::active()->stocked()->with(['department'])->paginate(12);
    //   dd($products);
        return view('Front.product.product_sales', [
            'products' => $products,
        ]);
    }
    public function comment_store(Request $request){

        $comment = new Comment();
        $comment->name = ['en' => $request->name, 'ar' => $request->name];
        $comment->role = ['en' => 'user', 'ar' => 'مستخدم'];
        $comment->comment = ['en' => $request->comment, 'ar' => $request->comment];
        $comment->status = 'disabled';
        $comment->previos_work_id=$request->previos_work_id;
        // dd($comment);
        $comment->save();

        return redirect()->back();
    }

    public function message_store(StoreMessage $request)
    {
        $message=Message::create($request->all());
        Mail::to('salimeslam55@gmail.com')->send(new UserMessage($message));
        return redirect()->back();
    }
}
