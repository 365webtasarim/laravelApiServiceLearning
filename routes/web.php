<?php

use App\Http\Controllers\Admin\GalleryContoller;
use App\Http\Controllers\SlidersController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\MakalelerController;
use \App\Http\Controllers\Admin\SohbetlerController;
use \App\Http\Controllers\Admin\YorumlarController;
use \App\Http\Controllers\Admin\VideoController as Video;
use \App\Http\Controllers\MediaController;
use \App\Http\Controllers\MenuController;
use \App\Http\Controllers\YazilarController;
use \App\Http\Controllers\Frontend\VideoController;
use \App\Http\Controllers\Frontend\FotografController;
use \App\Http\Controllers\Frontend\CategoryController;
use \App\Http\Controllers\Frontend\IndexController;

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


//Frontend
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
// Arama Sonuçları

Route::get('/slider', [\App\Http\Controllers\Frontend\IndexController::class, 'slider']);
Route::get('/arama-sonuclari', [\App\Http\Controllers\Frontend\IndexController::class, 'search']);
Route::get('/arama-sonuclari/{query}', [\App\Http\Controllers\Frontend\IndexController::class, 'searchQuery']);
Route::get('/makale/{slug}', [\App\Http\Controllers\Frontend\MakaleController::class, 'makaleShow'])->name('sohbetoku');
Route::post('/comment-form/{id}', [\App\Http\Controllers\Frontend\MakaleController::class, 'comment'])->name('postcomment');
Route::post('menudata', [MenuController::class, 'menudata']);
Route::get('kategori/{cat}', [CategoryController::class, 'index']);
Route::get('kose-yazilari', [YazilarController::class, 'index']);
Route::get('iletisim', [IndexController::class, 'contact']);
Route::post('iletisim', [IndexController::class, 'contactPost']);
Route::get('hayati', [IndexController::class, 'info']);
Route::get('kose-yazilari-guncelle', [YazilarController::class, 'guncelle']);
Route::get('kose-yazisi/{slug}', [YazilarController::class, 'yazi'])->name('yaziOku');
Route::get('videolar', [VideoController::class, 'index']);
Route::get('fotograflari', [FotografController::class, 'index']);
Route::get('video/{slug}', [VideoController::class, 'izle'])->name('videoizle');
//Backend
Route::group(['middleware' => 'auth','prefix'=>'admin'], function () {
        Route::get('dashboard', function () {
            $comments=\App\Models\Comment::where('status',0)->get();
            return view('dashboard',compact('comments'));
        })->middleware(['auth'])->name('dashboard');
        Route::post('/getPost/{type}', [YazilarController::class, 'getPost'])->middleware(['auth'])->name('getPost');
        Route::prefix('koseyazilari')->group(function () {
            Route::get('/', [MakalelerController::class, 'index'])->middleware(['auth'])->name('koseyazilari');
            Route::get('/edit/{id}', [MakalelerController::class, 'edit'])->middleware(['auth'])->name('editMakale');
            Route::post('/edit/{id}', [MakalelerController::class, 'editPost'])->middleware(['auth'])->name('editMakalePost');
            Route::get('/create', [MakalelerController::class, 'create'])->middleware(['auth'])->name('makaleCreate');
            Route::post('/create', [MakalelerController::class, 'store'])->middleware(['auth'])->name('makaleCreatePost');
            Route::post('/check-slug', [MakalelerController::class, 'checkSlug'])->middleware(['auth']);
            Route::delete('/{id}', [MakalelerController::class, 'destroy'])->middleware(['auth'])->name('makaleDelete');
        });
    Route::prefix('galeri')->group(function () {
        Route::get('/', [GalleryContoller::class, 'index'])->middleware(['auth'])->name('gallery');
        Route::post('/sort', [GalleryContoller::class, 'sort'])->middleware(['auth'])->name('galleryShort');
        Route::get('/create', [GalleryContoller::class, 'create'])->middleware(['auth'])->name('galleryCreate');
        Route::post('/create', [GalleryContoller::class, 'galleryCreatePost'])->middleware(['auth'])->name('galleryCreatePost');
        Route::delete('/{id}', [GalleryContoller::class, 'destroy'])->middleware(['auth'])->name('galleryDelete');
    });


        Route::prefix('sohbetler')->group(function () {
        Route::get('/', [SohbetlerController::class, 'index'])->middleware(['auth'])->name('sohbetler');
        Route::get('/edit/{id}', [SohbetlerController::class, 'edit'])->middleware(['auth'])->name('editSohbet');
        Route::post('/edit/{id}', [SohbetlerController::class, 'editPost'])->middleware(['auth'])->name('editSohbetPost');
        Route::get('/create', [SohbetlerController::class, 'create'])->middleware(['auth'])->name('SohbetCreate');
        Route::post('/create', [SohbetlerController::class, 'store'])->middleware(['auth'])->name('SohbetCreatePost');
        Route::post('/check-slug', [SohbetlerController::class, 'checkSlug'])->middleware(['auth']);
        Route::delete('/{id}', [SohbetlerController::class, 'destroy'])->middleware(['auth'])->name('SohbetDelete');
    });
    Route::prefix('yorumlar')->group(function () {
        Route::get('/', [YorumlarController::class, 'index'])->middleware(['auth'])->name('yorumlar');
        Route::get('/edit/{id}', [YorumlarController::class, 'edit'])->middleware(['auth'])->name('editYorumlar');
        Route::post('/edit/{id}', [YorumlarController::class, 'editPost'])->middleware(['auth'])->name('editYorumlarPost');
        Route::get('/create', [YorumlarController::class, 'create'])->middleware(['auth'])->name('YorumlarCreate');
        Route::post('/create', [YorumlarController::class, 'store'])->middleware(['auth'])->name('YorumlarCreatePost');
        Route::post('/check-slug', [YorumlarController::class, 'checkSlug'])->middleware(['auth']);
        Route::delete('/{id}', [YorumlarController::class, 'destroy'])->middleware(['auth'])->name('YorumlarDelete');
    });
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SlidersController::class, 'index'])->middleware(['auth'])->name('sliders');
        Route::post('/', [SlidersController::class, 'all'])->middleware(['auth'])->name('allSliders');
        Route::get('/edit/{id}', [SlidersController::class, 'edit'])->middleware(['auth'])->name('editSlider');
        Route::post('/edit/{id}', [SlidersController::class, 'editSlider'])->middleware(['auth'])->name('editSliderPost');
        Route::delete('/{id}', [SlidersController::class, 'destroy'])->middleware(['auth'])->name('deleteSlider');
        Route::get('/create', [SlidersController::class, 'create'])->middleware(['auth'])->name('sliderCreate');
        Route::post('/create', [SlidersController::class, 'store'])->middleware(['auth'])->name('sliderPostCreate');
    });
    Route::prefix('videolar')->group(function () {
        Route::get('/', [Video::class, 'index'])->middleware(['auth'])->name('videolar');
        Route::get('/edit/{id}', [Video::class, 'edit'])->middleware(['auth'])->name('editVideo');
        Route::post('/edit/{id}', [Video::class, 'editPost'])->middleware(['auth'])->name('editVideoPost');
        Route::get('/create', [Video::class, 'create'])->middleware(['auth'])->name('VideoCreate');
        Route::post('/create', [Video::class, 'store'])->middleware(['auth'])->name('VideoCreatePost');
        Route::post('/check-slug', [Video::class, 'checkSlug'])->middleware(['auth']);
        Route::delete('/{id}', [Video::class, 'destroy'])->middleware(['auth'])->name('VideoDelete');
    });
        Route::get('menu', [MenuController::class, 'index'])->name('menu');
        Route::get('menu/duzenle/{id}', [MenuController::class, 'duzenle'])->name('menuduzenle');

        Route::get('menudatalar', [MenuController::class, 'menudatalar']);
        Route::post('menudatalar', [MenuController::class, 'menusave']);
        Route::post('menuEkle', [MenuController::class, 'menuEkle']);
        Route::post('menuGuncelle', [MenuController::class, 'menuGuncelle']);
        Route::post('menuSil/{id}', [MenuController::class, 'destroy']);

        Route::post('media/store', [MediaController::class, 'store'])->name('media.store');
        Route::post('media/storeMedia', [MediaController::class, 'storeMedia'])->name('media.storeMedia');
        Route::post('media/storePostMedia', [MediaController::class, 'storePostMedia'])->name('media.storePostMedia');

});

require __DIR__ . '/auth.php';


