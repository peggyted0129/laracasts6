<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('home')->group(function(){
    Route::get('/', [HomeController::class, 'index'])
        ->name('home')
        ->middleware('auth');
    Route::get('user/{id}', function ($id) { // 傳變數至 view
        return 'welcome ， ' . $id;
    });
});

Route::get('articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('articles', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::get('articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::put('articles/{article}', [ArticlesController::class, 'update'])->name('articles.update');
Route::delete('articles/{article}', [ArticlesController::class, 'destroy'])->name('articles.destroy');



Route::get('/', function () {
    return view('welcome');
});

Route::any('captcha-test', function() {
    if (request()->getMethod() == 'POST') {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        } else {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }
    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
