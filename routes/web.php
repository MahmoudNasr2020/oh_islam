<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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
Route::group(['middleware' => 'auth'],

	function () {
		Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
	});



Route::group(['middleware'=>'SiteStatue'],function(){
    Route::get('/','Site\HomeController@index')->name('web.index');
    Route::get('/azkar/{id}/{name}','Site\AzkarController@index')->name('web.azkar');
    Route::get('/werds','Site\AzkarController@werd')->name('web.werd');
    Route::get('/video','Site\AzkarController@video')->name('web.video');
});

Route::get('/siteStatus',function(){
    return view('site.pages.status');
})->name('web.status')->middleware('OpenSite');

Route::middleware(ProtectAgainstSpam::class)->group(function () {
	Auth::routes(['verify' => true]);

});
