<?php

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



Route::group(['middleware' => 'setLocale'], function() {
    Route::get('/', 'Site\HomeController@index')->name('home');

    Route::get('new/{id}-{title}', 'Site\NewController@index')->name('new');
    Route::get('announcement/{id}-{title}', 'Site\AnnouncementController@index')->name('announcement');
// Route::get('document/{id}-{title}', 'Site\DocumentsController@index')->name('document');

    Route::get('news', 'Site\NewsController@index')->name('news');
    Route::get('announcements', 'Site\AnnouncementsController@index')->name('announcements');
    Route::get('document', 'Site\DocumentsController@index')->name('document');

    Route::get('pracevlashtuvannya-praktika', 'Site\PracevlashtuvannyaPraktikaController@index')->name('pracevlashtuvannya-praktika');

});


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function() {

	Route::get('/', function() {
		if (Auth::guest()) {
			return redirect('/auth/login');
		} else {
			return redirect('/admin/header');
		}
	});


	Route::get('/header-menu', function () {
	    return view('/admin/header-menu');
	})->name('ad_header-menu');

	Route::resource('header', 'Admin\HeaderController', ['as' => 'ad_header']);


	Route::resource('practic-header', 'Admin\PracticHeaderController', ['as' => 'ad_practic-header']);

	Route::resource('practic-cards', 'Admin\PracticCardController', ['as' => 'ad_practic-cards']);

	Route::resource('news', 'Admin\NewsController', ['as' => 'ad_news']);

	Route::resource('announcements', 'Admin\AnnouncementsController', ['as' => 'ad_announcements']);

	Route::resource('documents', 'Admin\DocumentsController', ['as' => 'ad_documents']);


	Route::resource('partners', 'Admin\PartnersController', ['as' => 'ad_partners']);


	Route::post('delete-subcategory', 'Admin\MenuController@deleteSubcategory');
	Route::post('delete-document', 'Admin\DocumentsController@deleteDocument');
    Route::post('delete-new', 'Admin\NewsController@destroy');
    Route::post('delete-announcement', 'Admin\AnnouncementsController@destroy');


	Route::resource('menus', 'Admin\MenuController', ['as' => 'ad_menus']);


	Route::get('footer', function () {
	    return view('/admin/footer');
	})->name('ad_footer');
	Route::get('menu/{id}', 'Admin\MenuController@index')->name('menu');
	// Route::get('new/{id}', function ($id) {
	//     return view('/admin/new', array('id' => $id));
	// });
	Route::get('document/create', function () {
	    return view('/admin/document_template');
	});
});
