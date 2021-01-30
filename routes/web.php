<?php
use crocodicstudio\crudbooster\controllers\AdminController as AdminController;

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

Route::get('/', function () {
    return view('draw_layout.index');
});

// Admin & Superadmin
Route::prefix('admin')->group(function () {
	// Preference (Event Module)
	Route::get('event/preferences/{id}', 'AdminEventController@preferences')->name('preferences');
	Route::post('event/save-preferences/{id}', 'AdminEventController@savePreferences')->name('save-preferences');

	// Disabled Category Module
	Route::get('category_disabled/add_selected_participant', 'AdminCategoryDisabledController@addSelectedParticipant');
	Route::get('category_by_event/{event}', 'AdminCategoryDisabledController@getCategory');
	Route::get('participant_by_event_category/{event}/{category}', 'AdminCategoryDisabledController@getParticipant');
	Route::post('category_disabled/save_disabled_category', 'AdminCategoryDisabledController@saveDisabledCategory');

	// Winner Module
	Route::get('winner_by_event_category/{event}/{category}', 'AdminWinnerController@getParticipant');
	Route::post('winner/save_winner', 'AdminWinnerController@saveWinner');
});


// Event Organizer
Route::get('eo/login', 'EOController@getLogin')->name('getLoginEO');
Route::group(['middleware' => ['eo-auth'], 'prefix' => 'eo'], function () {
	Route::get('/', 'EOController@getIndex');
	Route::get('profile', 'EOController@getProfile')->name('getEOProfile');
	Route::get('event_delete/{id}', 'EOEventController@destroy');
	Route::get('lockscreen', 'EOController@getLockscreen')->name('getEOLockScreen');

	Route::get('dashboard_event/category_delete/{id}', 'EOCategoryController@destroy');
	Route::get('dashboard_event/preferences', 'EOEventController@getPreferences');

	// Resources
	Route::resources([
	    'event' => 'EOEventController',
	    'dashboard_event/category' => 'EOCategoryController',
	    'payment' => 'PaymentController'
	]);


	Route::group(['prefix' => 'dashboard_event'], function () {
		Route::get('/{id}', 'EOEventController@dashboard');
	});
});