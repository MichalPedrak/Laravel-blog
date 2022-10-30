<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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


Route::get("pink", function(){
    $mailchimp = new \MailchimpMarketing\ApiClient();
//dd( $mailchimp->setConfig()->root->getConfig()->root);
//    $mailchimp->setConfig([
//        'verify' =>false,
//        'apiKey' => config('services.mailchimp.key'),
//        'server' => 'us21'
//    ]);

    $response = $mailchimp->ping->get();
    print_r($response);
    run();
});

Route::get('/', [PostController::class, 'index'])->name('home'); // Ładuj w posts controller action index - wszystko co wczesniej było tutaj
Route::get('admin/posts/create', [PostController::class, 'create']); // Ładuj w posts controller action index - wszystko co wczesniej było tutaj
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');

Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');

Route::post('posts/{post:slug}/comments', [CommentController::class, 'store']);




Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
//        'currentCategory' => $category,
//        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts,
//        'categories' => Category::all()
    ]);
});


//Route::get('/posts/{post}', function ($slug) {  // wildcard - it take what is provided there, and impelement to code below, {post} => $slug
////    return $slug;
//    $path = __DIR__ . '/../resources/posts/' . $slug .  '.html';  // path - location of the post html file
//    //where is the post content that we want to show
//
////    ddd($path);
//
//    if(!file_exists($path)) {
////        dd('file not found');  // kill execution and var dump
//        return redirect('/');  // redirect to site
//        abort(404); // 404
//    }
//
//
////    $post = cache()->remember("posts.{$slug}", 5, function () use ($path)  // now()->addWeeks() now()->addDays() now()->addHours() now()->addMinutes()
////    {
////        var_dump( 'file_get_contents');
////        return file_get_contents($path);
////
////    });
//
//    $post = cache()->remember("posts.{$slug}", 5, fn() => file_get_contents($path));
//   // now()->addWeeks() now()->addDays() now()->addHours() now()->addMinutes()
//
//
//
//
//
//    // cachujemy post, aby nie musieć go pobierać kilka razy.
//    // to zapisuje nam ten content w cachu przez 5 sekund, w funkcji dajemy jaki content. Jak pobierzemy to nam var_dump się pojawi pierw, a później
//    // dopiero po 5 sekundach jak odświezymy, wczesniej jak odswiezymy to nie bedzie nam pokazywać
//
//
//
////    $post = file_get_contents($path); // $post = take all content from $path
//
//
//
//
//
//    return view('post',[
//        'post' => $post  // and give it to this view, as a argumnet
//    ]);
//})->where("post", "[A-z_\-]+");  // whereAlpha("post")
//// gdzie wildcard jest taki jak regular expresion, tutaj nam mówi jakie rzeczy mozemy wpisać do url
//// A-z + to one or more i mozemy uzywac sobie _ i - // i jeśli wpiszemy coś źle to daje nam 404
//// np. test!!! to 404 a gdy damy TEstASDSADa to nam pokaze ze nie ma takiego konkretnego routa

// single post route
