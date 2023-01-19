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
//トップ画面に遷移
Route::get("/", [TopController::class, "index"])->name("top");
//協会概要画面に遷移
Route::get("/about", [AboutController::class, "index"])->name("about");
//協会の歩み画面に遷移
Route::get("/history", [HistoryController::class, "index"])->name("history");
//年間計画画面に遷移
Route::get("plans", [PlansController::class, "index"])->name("plans");
//試合・要項結果一覧画面に遷移
Route::get("/results", [ResultsController::class, "index"])->name("results");
//大会記録一覧画面に遷移
Route::get("/records", [RecordsController::class, "index"])->name("records");
//選手紹介画面に遷移
Route::get("/lifters", [LiftersController::class, "index"])->name("lifters");
//お知らせ一覧画面に遷移
Route::get("/news", [NewsController::class, "index"])->name("news");
//お知らせ詳細画面に遷移
Route::get("/news/{:id}", [NewsController::class, "show"])->name("news.show");
//お問い合わせ画面に遷移
Route::get("/contact", [ContactController::class, "index"])->name("contact");


//ログインづみ
Route::middleware('auth')->group(function () {
    //ユーザープロファイル
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //トップ編集画面に遷移
    Route::get("/admin/top", [TopController::class, "edit"])->name("admin.top");
    //トップ編集
    Route::put("/admin/top", [TopController::class, "update"])->name("admin.top.edit");
    //トップ編集
    Route::put("/admin/about", [AboutController::class, "update"])->name("admin.about.update");
    //試合・要項結果登録画面に遷移
    Route::get("/admin/results", [ResultsController::class, "new"])->name("admin.results");
    //試合・要項結果登録
    Route::post("/admin/results", [ResultsController::class, "create"])->name("admin.results.create");
    //試合・要項結果編集画面に遷移
    Route::get("/admin/results/{:id}/edit", [ResultsController::class, "edit"])->name("admin.results.edit");
    //試合・要項結果編集
    Route::put("/admin/results/{:id}", [ResultsController::class, "update"])->name("admin.results.update");
    //試合・要項結果削除
    Route::delete("/admin/results/{:id}", [ResultsController::class, "destroy"])->name("admin.results.destroy");
    //選手登録画面に遷移
    Route::get("/admin/lifters", [LiftersController::class, "new"])->name("admin.lifters");
    //選手登録
    Route::post("/admin/lifters", [LiftersController::class, "create"])->name("admin.lifters.create");
    //選手編集画面に遷移
    Route::get("/admin/lifters/{:id}/edit", [LiftersController::class, "edit"])->name("admin.lifters.edit");
    //選手編集
    Route::put("/admin/lifters/{:id}", [LiftersController::class, "update"])->name("admin.lifters.update");
    //選手削除
    Route::delete("/admin/lifters/{:id}", [LiftersController::class, "destroy"])->name("admin.lifters.destroy");
    //お知らせ登録画面に遷移
    Route::get("/admin/news", [NewsController::class, "new"])->name("admin.news");
    //お知らせ登録
    Route::post("/admin/news", [NewsController::class, "create"])->name("admin.news.create");
    //お知らせ編集画面に遷移
    Route::get("/admin/{:id}/edit", [NewsController::class, "edit"])->name("admin.news.edit");
    //お知らせ編集
    Route::put("/admin/{:id}", [NewsController::class, "update"])->name("admin.news.update");
    //お知らせ削除
    Route::delete("/admin/{:id}", [NewsController::class, "destroy"])->name("admin.news.destroy");
    //メール送信処理
    Route::post("/admin/contact/send", [ContactController::class, "send"])->name("admin.contact.send");
    //年間計画編集
    Route::put("admin/plans", [PlansController::class, "update"])->name("admin.plans.update");
    //ドキュメント編集画面に遷移
    Route::get("/admin/document", [DocumentsController::class, "edit"])->name("document");
});


#laravel-breezeのルート
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
