<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
// your api is integerated but if you want reintegrate no problem
// to configure jwt-auth visit this link https://jwt-auth.readthedocs.io/en/docs/

Route::group(['middleware' => ['ApiLang', 'cors'], 'prefix' => 'v1', 'namespace' => 'Api\V1'], function () {

	Route::get('/', function () {

	});
	// Insert your Api Here Start //
	Route::group(['middleware' => 'guest'], function () {
		Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
		Route::post('register', 'Auth\Register@register')->name('api.register');
	});

	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
		Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
		Route::post('refresh', 'Auth\AuthAndLogin@refresh')->name('api.refresh');
		Route::post('me', 'Auth\AuthAndLogin@me')->name('api.me');
		Route::post('change/password', 'Auth\AuthAndLogin@change_password')->name('api.change_password');
		//Auth-Api-Start//
		Route::apiResource("categories","CategoriesApi", ["as" => "api.categories"]); 
			Route::post("categories/multi_delete","CategoriesApi@multi_delete"); 
			Route::apiResource("azkars","AzkarsApi", ["as" => "api.azkars"]); 
			Route::post("azkars/multi_delete","AzkarsApi@multi_delete"); 
			Route::apiResource("werds","WerdsApi", ["as" => "api.werds"]); 
			Route::post("werds/multi_delete","WerdsApi@multi_delete"); 
			Route::apiResource("videos","VideosApi", ["as" => "api.videos"]); 
			Route::post("videos/multi_delete","VideosApi@multi_delete"); 
			//Auth-Api-End//
	});
	// Insert your Api Here End //
});