<?php

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

Route::get('/', 'App\Http\Controllers\FrontendController@index' );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-topic', function () {
    return view('client.new-topic');
});
Route::get('/category/overview/{id}', 'App\Http\Controllers\FrontendController@categoryOverview')->name('category.overview');
Route::get('/topic', function () {
    return view('client.topic');
});
Route::get('/t-overview', function () {
    return view('client.topic-overview');
});
Route::middleware(['auth', 'admin'])->group(function () {
    route::get('/dashboard/home','App\Http\Controllers\DashboardController@home');
    route::get('dashboard/category/new','App\Http\Controllers\CategoryController@create')->name('category.new');
    route::post('dashboard/category/new','App\Http\Controllers\CategoryController@store')->name('category.store');
    route::get('dashboard/categories','App\Http\Controllers\CategoryController@index')->name('categories');
    route::get('dashboard/categories/{id}','App\Http\Controllers\CategoryController@show')->name('category');    
    route::get('dashboard/categories/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('category.edit');
    route::post('dashboard/categories/edit/{id}','App\Http\Controllers\CategoryController@update')->name('category.update');
    route::get('dashboard/categories/delete/{id}','App\Http\Controllers\CategoryController@destroy')->name('category.destroy');
//fourms
route::get('dashboard/forum/new','App\Http\Controllers\ForumController@create')->name('forum.new');
route::post('dashboard/forum/new','App\Http\Controllers\ForumController@store')->name('forum.store');
route::get('dashboard/forums','App\Http\Controllers\ForumController@index')->name('forums');
route::get('dashboard/forums/{id}','App\Http\Controllers\ForumController@show')->name('forum');
route::get('dashboard/forums/edit/{id}','App\Http\Controllers\ForumController@edit')->name('forum.edit');
route::post('dashboard/forums/edit/{id}','App\Http\Controllers\ForumController@update')->name('forum.update');
route::get('dashboard/forums/delete/{id}','App\Http\Controllers\ForumController@destroy')->name('forum.destroy');
//users
route::get('/dashboard/users','App\Http\Controllers\DashboardController@users');

route::get('/dashboard/users/{id}','App\Http\Controllers\DashboardController@show');
route::post('/dashboard/users/{id}','App\Http\Controllers\DashboardController@destroy')->name('user.delete');
route::get('/dashboard/admin/profile','App\Http\Controllers\DashboardController@profile')->name('admin.profile');

route::get('/dashboard/notifications','App\Http\Controllers\DashboardController@notifications')->name('notifications');

route::get('/dashboard/notifications/mark-as-read/{id}','App\Http\Controllers\DashboardController@markAsRead')->name('notification.read');
route::get('/dashboard/notifications/delete/{id}','App\Http\Controllers\DashboardController@notificationDestroy')->name('notification.delete');
route::post('dashboard/settings/new','App\Http\Controllers\DashboardController@newSetting')->name('setting.new');
route::get('dashboard/settings/form','App\Http\Controllers\DashboardController@settingsForm')->name('settings.form');
});
Route::get('/check', 'App\Http\Controllers\FrontendController@userOnlineStatus');
Route::get('/forum/overview/{id}', 'App\Http\Controllers\FrontendController@forumOverview' )->name('forum.overview');



//forums

//topics
route::get('client/topic/new/{id}','App\Http\Controllers\TopicController@create')->name('topic.new');
route::post('client/topic/new','App\Http\Controllers\TopicController@store')->name('topic.store');
route::get('client/topic/{id}','App\Http\Controllers\TopicController@show')->name('topic');
route::post('client/topic/reply/{id}','App\Http\Controllers\TopicController@reply')->name('topic.reply');
route::get('client/topic/remove/{id}','App\Http\Controllers\TopicController@remove')->name('topic.delete');

Route::get('/topic/reply/delete/{id}', 'App\Http\Controllers\TopicController@destroy')->name('reply.delete');

//Route::get('/update', 'App\Http\Controllers\TopicController@updates');
Route::post('/update/user/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');





// route::get('dashboard/forums','App\Http\Controllers\ForumController@index')->name('forums');
// route::get('dashboard/forums/{id}','App\Http\Controllers\ForumController@edit')->name('forum');
// route::get('dashboard/forums/edit/{id}','App\Http\Controllers\ForumController@edit')->name('forum.edit');
// route::post('dashboard/forums/edit/{id}','App\Http\Controllers\ForumController@update')->name('forum.update');
// route::get('dashboard/forums/delete/{id}','App\Http\Controllers\ForumController@destroy')->name('forum.destroy');




route::get('client/user/{id}','App\Http\Controllers\FrontendController@profile')->middleware('auth')->name('client.user.profile');
route::get('client/users','App\Http\Controllers\FrontendController@users')->middleware('auth')->name('client.users');
route::post('user/photo/update/{id}','App\Http\Controllers\FrontendController@photoUpdate')->name('user.photo.update');

route::get('reply/like/{id}','App\Http\Controllers\TopicController@like')->name('reply.like');
route::get('reply/dislike/{id}','App\Http\Controllers\TopicController@dislike')->name('reply.dislike');
route::post('category/search','App\Http\Controllers\CategoryController@search')->name('category.search');













Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
