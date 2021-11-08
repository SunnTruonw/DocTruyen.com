<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\TheLoaiController;


Route::get('/', [App\Http\Controllers\IndexController::class, 'home']);
Route::get('/danh-muc/{slug}', [App\Http\Controllers\IndexController::class, 'danhmuc']);
Route::get('/xem-truyen/{slug}', [App\Http\Controllers\IndexController::class, 'xemtruyen']);

Route::get('/xem-sach', [App\Http\Controllers\IndexController::class, 'xemsach']);
Route::post('/xemsachnhanh', [App\Http\Controllers\IndexController::class, 'xemsachnhanh']);

Route::get('/xem-chapter/{slug_truyen}/{slug}', [App\Http\Controllers\IndexController::class, 'xemchapter']);
Route::get('/the-loai/{slug}', [App\Http\Controllers\IndexController::class, 'theloai']);
Route::get('/tag/{tag}', [App\Http\Controllers\IndexController::class, 'tag']);

#timkiem

Route::post('/tim-kiem', [App\Http\Controllers\IndexController::class, 'timkiem']);
Route::post('/timkiem-ajax', [App\Http\Controllers\IndexController::class, 'timkiem_ajax']);

Route::post('/truyennoibat', [App\Http\Controllers\TruyenController::class, 'truyennoibat']);
#tag-danhmuc
Route::post('/tabs-danhmuc', [App\Http\Controllers\IndexController::class, 'tabdanhmuc']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/danhmuc', DanhMucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/sach', SachController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheLoaiController::class);


#upload

Route::post('upload/services', [UploadController::class, 'store']);