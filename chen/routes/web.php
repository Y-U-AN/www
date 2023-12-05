  <?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminPostControlle;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostControllerr;
use App\Http\Controllers\UploadController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;


use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

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

Route::get('/cmy', function () {
    return view('welcome'); 
});



Route::get('/', function () {
   
    // $post = array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document ->title,
    //         $document ->excerpt,
    //         $document ->date,
    //         $document ->body(),
    //         $document ->slug

    //     );
    // },$files); 

    // foreach ($files as $file){

     

    // $posts = collect(File::files(resource_path("posts")))

    //     ->map(fn($file) => YamlFrontMatter::parseFile($file))
    //     ->map(fn($document) => new Post(
    //             $document ->title,
    //             $document ->excerpt,
    //             $document ->date,
    //             $document ->body(),
    //             $document ->slug
    //     ));


    // $posts = Post::all();

    // dd(request('search'));

    
    $posts = Post::latest();

    if (request('search')){
        $posts->where('title', 'like', '%' . request('search') . '%');
    }

    return view('index', [
        'index' => $posts->get(),
        'categories'=>Category::all()
        // Post::latest()->get()//->with('category','author')->get()
    ]);
});
    



Route::get('/index/{post:slug}', function (Post $post) {
    return view ('post',[
        'post' => $post
    ]);      
});


Route::get('/categories/{category:slug}', function (Category $category) {
    return view ('index',[
        'index' => $category->posts//->load(['category','author'])
    ]);      
});


Route::get('authors/{author:username}', function (User $author) { 
    return view ('index',[
        'index' => $author->posts//->load(['category','author'])
    ]);      
});


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destory'])->middleware('auth');


Route::post('admin/posts/', [AdminPostControlle::class, 'store'])->middleware('can:admin');
Route::get('admin/posts/create', [AdminPostControlle::class, 'create'])->middleware('can:admin');
Route::get('admin/posts', [AdminPostControlle::class, 'index'])->middleware('can:admin');
Route::get('admin/posts/{post}/edit', [AdminPostControlle::class, 'edit'])->middleware('can:admin');
Route::patch('admin/posts/{post}', [AdminPostControlle::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}', [AdminPostControlle::class, 'destroy'])->middleware('can:admin');




// Route::get('/uploads/upload', [UploadController::class, 'create']);
// Route::post('/uploads', [UploadController::class, 'store']);
// Route::get('/uploads/{upload}/{originalName?}', [UploadController::class, 'show']);
