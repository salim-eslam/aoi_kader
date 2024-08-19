<?php

use App\Mail\UserMessage;
use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\SlidbarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PreviosWorkController;
use App\Http\Controllers\VideoLibraryController;

// use App\Http\Middleware\TrackVisitor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'/admin/'], function () {
    Auth::routes();
});
Route::get('admin2/{page}', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/page_500', [AdminController::class, 'page_500']);
Route::get('/send_mail',function()
{
    Mail::to('salimeslam55@gmail.com')->send(new UserMessage('hello atico'));
});

Route::group(['prefix'=>'/admin/','middleware' => ['auth','admin']], function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/index', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('teams', TeamController::class);

    Route::resource('categories', CategoryController::class);
    Route::resource('slidbars', SlidbarController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('offers', OfferController::class);
    Route::resource('cataloges', CatalogController::class);
    Route::resource('previos_works', PreviosWorkController::class);
    Route::resource('products', ProductController::class);
    // Route::get('partners',  [PartnerController::class,'index'])->name('partners.index');
    Route::get('partners/index',[PartnerController::class,'index'])->name('partners.index');
    Route::get('partners/create',[PartnerController::class,'create'])->name('partners.create');
    Route::post('partners/store',[PartnerController::class,'store'])->name('partners.store');
    Route::get('partners/edit/{id}',[PartnerController::class,'edit'])->name('partners.edit');
    Route::post('partners/edit/{id}',[PartnerController::class,'update'])->name('partners.update');
    Route::delete('partners/delete/{id}',[PartnerController::class,'destroy'])->name('partners.destroy');

    Route::resource('messages', MessageController::class);

    Route::post('/product_save_photos',  [ProductController::class, 'saveAttachmentPhotos'])->name('products.photo.store');
    Route::post('/previos_work_save_photos',  [PreviosWorkController::class, 'saveAttachmentPhotos'])->name('previos_work.photo.store');
    Route::get('/comment/{id}',  [CommentController::class, 'create'])->name('comment.create');
    Route::post('/comment',  [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{comment}/edit',  [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{comment}',  [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}',  [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::delete('/previos_work/delete_photo/{photo}',  [PreviosWorkController::class, 'destroy_photo'])->name('previos_works_photo_destroy');
    Route::delete('/product/delete_photo/{photo}',  [ProductController::class, 'destroy_photo'])->name('product_photo_destroy');


});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/home', function () {
            return view('home');
        });
        Route::get('/',  [HomeController::class, 'index'])->name('home');
        Route::get('/contact_us',  [HomeController::class, 'contact'])->name('contact_us');
        Route::get('/about_us',  [HomeController::class, 'about'])->name('about_us');
        Route::get('/video_library',  [VideoLibraryController::class, 'index'])->name('video_library');


        Route::get('/product/show/{id}',  [HomeController::class, 'product_show'])->name('product_show');
        Route::get('/product/depratment_filter/{id}',  [HomeController::class, 'product_department_filter'])->name('product_department_filter');
        Route::get('/product/sales',  [HomeController::class, 'product_sales_filter'])->name('product_sales_filter');
        Route::get('/product/instock',  [HomeController::class, 'product_instock_filter'])->name('product_instock_filter');
        Route::get('/profile/projects',  [HomeController::class, 'profile_projects'])->name('profile_projects');
        Route::get('/project/show/{id}',  [HomeController::class, 'project_show'])->name('project_show');
        Route::get('/profile/cataloges',  [HomeController::class, 'profile_cataloges'])->name('profile_cataloges');
        Route::get('/search',  [HomeController::class, 'search'])->name('product_search');

        Route::post('/profile/project_detail/save/comment', [HomeController::class, 'comment_store'])->name('comment.project_detail.store');
        Route::post('/contact_us/save/comment', [HomeController::class, 'message_store'])->name('message.user.store');

    }
);
