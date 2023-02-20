<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\LiftersController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentsController;
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

//ログインなし
//トップ画面
Route::resource('/', TopController::class, ['only' => ['index']]);
//協会概要画面
Route::resource('/about', AboutController::class, ['only' => ['index']]);
//協会の歩み画面
Route::resource('/history', HistoryController::class, ['only' => ['index']]);
//年間計画画面
Route::resource('/plans', PlansController::class, ['only' => ['index']]);
//試合・要項結果一覧画面
Route::resource('/results', ResultsController::class, ['only' => ['index']]);
//大会記録一覧画面
Route::resource('/records', RecordsController::class, ['only' => ['index']]);
//選手紹介画面
Route::resource('/lifters', LiftersController::class, ['only' => ['index']]);
//お知らせ一覧画面、詳細画面
Route::resource('/news', NewsController::class, ['only' => ['index', 'show']]);
//お問い合わせ画面
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

//ログインづみ
Route::middleware('auth')->prefix('admins')->name('admins.')->group(function () {
    //ユーザープロファイル
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //トップ画面編集
    Route::get('/top/edit', [TopController::class, 'edit'])->name('top.edit');
    Route::put('/top/update', [TopController::class, 'update'])->name('top.update');
    // Route::resource('/top', TopController::class, ['only' => ['edit', 'update']]);
    //試合・要項結果登録画面CRUD
    Route::resource('/results', ResultsController::class, ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    //選手登録画面CRUD
    Route::resource('/lifters', LiftersController::class, ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    //お知らせ登録画面CRUD
    Route::resource('/news', NewsController::class, ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    //年間計画編集
    Route::resource('/plans', PlansController::class, ['only' => ['update']]);
    //ドキュメント編集
    Route::get('/documents/edit', [DocumentsController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/update', [DocumentsController::class, 'update'])->name('documents.update');
});


#laravel-breezeのルート
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
