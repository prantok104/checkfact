<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Admin\AdminRumorController;
use App\Http\Controllers\Admin\AdminCommentController;
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

// Reset website route
Route::get('/reset', function (){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return redirect()->to('/');
});

Auth::routes();

// FrontPage All routes
Route::group(['middleware' => 'auth', 'namespace' => 'Front', 'as'=>'front.'], function (){
    Route::get('user-profile', [PageController::class, 'user'])->name('user');
    Route::get('logout', [PageController::class, 'logout'])->name('logout');
    Route::post('comment', [AdminCommentController::class, 'store'] )->name('post.comment');
});
// FrontPage All routes
Route::group(['namespace' => 'Front', 'as'=>'front.'], function (){

    Route::get('/', [PageController::class, 'index'])->name('homepage');

    // Subscription Route
    Route::post('/subscriber', [SubscriberController::class, 'subscriber'])->name('subscriber');
    Route::get('/archive-serach', [PageController::class, 'archiveSearch'])->name('archive.search');
    Route::get('/single/{slug}', [PageController::class, 'singlePage'])->name('single');
    Route::get('/search', [PageController::class, 'globalSearch'])->name('global.search');
    Route::get('/news', [PageController::class, 'news'])->name('news');
    Route::get('/category/{slug}', [PageController::class, 'categoryPage'])->name('category');

    //Rumor Route
    Route::get('rumor', [AdminRumorController::class, 'index'])->name('rumor');
    Route::post('rumor/send', [AdminRumorController::class, 'rumorSend'])->name('rumor.send');

});


// Admin page all route
Route::group(['namespace' => 'Admin', 'as' => 'admin.',  'prefix' => 'admin'], function (){
   Route::get('login', [AdminPageController::class, 'login'])->name('login');
   Route::post('login', [AdminLoginController::class, 'loginSubmit'])->name('login.submit');
   Route::get('register', [AdminPageController::class, 'register'])->name('register');
});


Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function (){

    // Analytics route here
    Route::get('dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');
    Route::get('users', [AdminPageController::class, 'users'])->name('users');
    Route::get('user/block/{id}', [AdminPageController::class, 'userBlock'])->name('user.block');
    Route::get('user/unblock/{id}', [AdminPageController::class, 'userUnblock'])->name('user.unblock');
    Route::get('block/user', [AdminPageController::class, 'blockUsers'])->name('block.users');

    // All auth route here
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');

    // All Route for Post related
    Route::get('/posts/add-new', [AdminPostController::class, 'index'])->name('posts.add-new');
    Route::post('/posts/store', [AdminPostController::class, 'store'])->name('posts.store');
    Route::get('/posts/view-all', [AdminPostController::class, 'view'])->name('posts.all');
    Route::match(['get', 'post'],'/posts/edit/{id}', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/update/{id}', [AdminPostController::class, 'update'])->name('posts.update');
    Route::get('/posts/trash', [AdminPostController::class, 'trash'])->name('posts.trash');
    Route::get('/posts/delete/{id}', [AdminPostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/force-delete/{id}', [AdminPostController::class, 'forceDelete'])->name('posts.force.delete');
    Route::get('/posts/restore/{id}', [AdminPostController::class, 'restore'])->name('posts.restore');
    Route::get('/posts/draft/{id}', [AdminPostController::class, 'draft'])->name('posts.draft');
    Route::get('/posts/publish/{id}', [AdminPostController::class, 'publish'])->name('posts.publish');
    Route::get('/posts/draft', [AdminPostController::class, 'draftPosts'])->name('posts.draft.all');
    Route::get('/posts/pined/{id}', [AdminPostController::class, 'postPinForHero'])->name('posts.pin');
    Route::post('/posts/image-upload', [AdminPostController::class, 'imageUpload'])->name('posts.image.upload');

    // All Route for Category related
    Route::get('/category/add-new', [AdminCategoryController::class, 'index'])->name('category.add-new');
    Route::post('/category/store', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::match(['get', 'post'], '/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::get('/category/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/trash', [AdminCategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/restore/{id}', [AdminCategoryController::class, 'restore'])->name('category.restore');
    Route::get('/category/force-delete/{id}', [AdminCategoryController::class, 'forceDelete'])->name('category.force-delete');

    // All Route for Videos
    Route::get('/videos/add-new', [AdminVideoController::class, 'index'])->name('video.add-new');
    Route::post('/video/store', [AdminVideoController::class, 'store'])->name('video.store');
    Route::match(['get', 'post'], '/video/edit/{id}', [AdminVideoController::class, 'edit'])->name('video.edit');
    Route::post('/video/update/{id}', [AdminVideoController::class, 'update'])->name('video.update');
    Route::get('/video/destroy/{id}', [AdminVideoController::class, 'destroy'])->name('video.destroy');
    Route::get('/video/trash', [AdminVideoController::class, 'trash'])->name('video.trash');
    Route::get('/video/restore/{id}', [AdminVideoController::class, 'restore'])->name('video.restore');
    Route::get('/video/force-delete/{id}', [AdminVideoController::class, 'forceDelete'])->name('video.force.delete');

    // Subscriber Route
    Route::get('/subscriber/lists', [SubscriberController::class, 'index'])->name('subscriber');

    // Check Rumor
    Route::get('/check/rumors/lists', [AdminRumorController::class, 'rumorListsShow'])->name('rumor.lists');
    Route::get('/check/rumors/view/{id}', [AdminRumorController::class, 'rumorView'])->name('rumor.view');
    Route::get('/check/rumors/send-mail/{type}/{id}', [AdminRumorController::class, 'rumorSendMail'])->name('rumor.send-mail');


});
//Route::auth();

// App licalization
Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('change.lang');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

