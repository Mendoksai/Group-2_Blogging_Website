<?php
use App\Http\Controllers\CommentsController;
use App\Models\Post;
use App\Models\User;
use App\Models\PageViews;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SearchController;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//user
Route::get('/', function () {
    return view('auth.login');
});

//admin
Route::get('/admin', function () {

    // $views = PageViews::count();
    // $users = User::count();

    // return view('admin-welcome', compact('views', 'users'));
    return view('admin-welcome');
});

Route::get('/dashboard', function () {
    $data['posts'] = Post::orderBy('created_at', 'desc')->get();
    session()->flash('login', 'Login success!');
    return view('dashboard')->with($data);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dump', function (Request $request) {
    dd($request->all());
});

//tester
Route::get('/tester', function () {
    return view('codes');
});

require __DIR__ . '/auth.php';

Route::post('/store-post', [PostController::class, 'store'])->name('post.store');
// Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


Route::resource('comments', CommentsController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

// SHOW POST URL
Route::get('/users/{id}', [ProfileController::class, 'showProfile'])->name('user.show-profile');
Route::get('/posts/degree/{degree_name}', [PostController::class, 'showByDegree'])->name('posts.degree');

//DELETE AREA
Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
Route::delete('/posts/{postId}', [PostController::class, 'destroy'])->name('posts.destroy');

//UPDATING AREA
Route::put('/comments/{comment}', [CommentsController::class, 'update'])->name('comments.update');
Route::put('/posts/{postId}', [PostController::class, 'update'])->name('posts.update');

//reply in comment
Route::post('/comments/{comment}/reply', [CommentsController::class, 'storeReply'])->name('comments.storeReply');
Route::delete('/comments/replies/{reply:id}', [CommentsController::class, 'destroyReply'])->name('comments.destroyReply');
Route::put('/comments/{reply}', 'CommentsController@updateReply')->name('comments.updateReply');


//search
//Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/searchTitle', [SearchController::class, 'searchTitle'])->name('search-title');






//Admin Routes


Route::middleware(['auth','role:Admin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::prefix('/student')->group(function(){
            Route::get('/index',[StudentController::class,'index'])->name("students");
            Route::post('/index',[StudentController::class,'search']); //for the search function

            Route::get('/create',[StudentController::class,'create']);
            Route::post('/create_store',[StudentController::class,'create_store']);
            Route::get('/update/{user_id}',[StudentController::class,'update']);
            Route::post('/update_store',[StudentController::class,'update_store']);
            Route::post('/delete',[StudentController::class,'delete']);

        });
    });
});



