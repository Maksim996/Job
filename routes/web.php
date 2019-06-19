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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

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

	Route::post('delete-announcement', 'Admin\AnnouncementsController@destroy');

	Route::post('delete-new', 'Admin\NewsController@destroy');

	// Route::get('practic-header', function () {
	//     return view('/admin/practic-header');
	// })->name('ad_practic-header');
	// Route::get('practic-cards', function () {
	//     return view('/admin/practic-cards');
	// })->name('ad_practic-cards');
 //    Route::get('announcements', function () {
	//     return view('/admin/announcements');
	// })->name('ad_announcements');
	// Route::get('announcement/{id}', function ($id) {
	//     return view('/admin/announcement', array('id' => $id));
	// });
	// Route::get('documents', function () {
	//     return view('/admin/documents');
	// })->name('ad_documents');
	// Route::get('news', function () {
	//     return view('/admin/news');
	// })->name('ad_news');
	Route::get('brands', function () {
	    return view('/admin/brands');
	})->name('ad_brands');
	Route::get('footer', function () {
	    return view('/admin/footer');
	})->name('ad_footer');
	// Route::get('new/{id}', function ($id) {
	//     return view('/admin/new', array('id' => $id));
	// });
	Route::get('document/create', function () {
	    return view('/admin/document_template');
	});
	Route::get('partners', function () {
	    return view('/admin/partners');
	})->name('ad_partners');
});

//site routes
Route::get('template', function(){
	return view('site/template');
});
Route::get('/', 'Site\HomeController@index')->name('home');

Route::get('new/{id}-{title}', 'Site\NewController@index')->name('new');
Route::get('announcement/{id}-{title}', 'Site\AnnouncementController@index')->name('announcement');
Route::get('document/{id}-{title}', 'Site\DocumentsController@index')->name('document');

Route::get('news', 'Site\NewsController@index')->name('news');
Route::get('announcements', 'Site\AnnouncementsController@index')->name('announcements');
Route::get('documents', 'Site\DocumentsController@index')->name('documents');
