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

use Illuminate\View\View;


Auth::routes();


// dashboard
Route::prefix('dashboard')->namespace('Admin')->middleware(['auth', 'CheckAdmin'])->group(function () {

    Route::get('/', 'AdminController@index')->name('admin');


    Route::get('changemyinfo', 'AdminController@getmyinfo')->name('changemyinfo');
    Route::post('getmyinfo', 'AdminController@getmyinfos')->name('get.myinfo');
    Route::post('savemyinfo', 'AdminController@savemyinfo')->name('savemy.info');


    Route::get('user', 'UserController@index')->name('user.list');
    Route::post('users', 'UserController@getusers')->name('get.users');
    Route::post('saveuser', 'UserController@saveuser')->name('save.user');
    Route::post('deleteuser', 'UserController@deleteuser')->name('delete.user');



    // filemanager
    Route::post('getfilemanager', 'FilemanagerController@getfilemanager')->name('get.filemanager');
    Route::post('savefile', 'FilemanagerController@savefile')->name('save.file');



    // slider
    Route::get('slider', 'SliderController@index')->name('slider');
    Route::post('getslider', 'SliderController@getslider')->name('getslider');
    Route::post('savesliderimage', 'SliderController@savesliderimage')->name('save.sliderimage');
    Route::post('deletesliderimage', 'SliderController@deletesliderimage')->name('delete.sliderimage');





    Route::get('setting', 'SettingController@index')->name('setting');
    Route::post('getsetting', 'SettingController@getsetting')->name('get.setting');
    Route::post('savesetting', 'SettingController@savesetting')->name('save.setting');




    // group
    Route::get('article', 'ArticleController@index')->name('article.group.list');
    Route::post('getarticlegroups', 'ArticleController@getarticlegroups')->name('get.articlegroups');
    Route::post('savegroup', 'ArticleController@savegroup')->name('save.articlegroup');
    Route::post('deletegroup', 'ArticleController@deletegroup')->name('delete.articlegroup');



    // article
    Route::get('articles/{id}', 'ArticleController@articles')->name('articles');
    Route::post('getarticles', 'ArticleController@getarticles')->name('get.articles');
    Route::post('savearticle', 'ArticleController@savearticle')->name('save.article');
    Route::post('savearticleimage', 'ArticleController@savearticleimage')->name('save.articleimage');
    Route::post('deletearticle', 'ArticleController@deletearticle')->name('delete.article');
    Route::post('changepublisharticle', 'ArticleController@changepublisharticle')->name('changepublish.article');
    Route::post('changeimportantarticle', 'ArticleController@changeimportantarticle')->name('changeimportant.article');
    Route::post('savearticledes', 'ArticleController@savearticledes')->name('save.articledes');
    Route::post('savefile', 'FilemanagerController@savefile')->name('save.file');




    Route::get('menu', 'MenuController@index')->name('menu');
    Route::post('getmenus', 'MenuController@getmenus')->name('get.menugroups');
    Route::post('savemenu', 'MenuController@savemenu')->name('save.menu');
    Route::post('deletemenu', 'MenuController@deletemenu')->name('delete.menu');
});




Route::namespace('Client')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::post('getslider', 'HomeController@getslider')->name('getslider');
    Route::post('getlastnews', 'HomeController@getlastnews')->name('getlastnews');
    Route::post('getimportantnews', 'HomeController@getimportantnews')->name('getimportantnews');
    Route::get('{id}/{title}', 'HomeController@articleshow')->name('articleshow');
    Route::get('contact', 'HomeController@contact')->name('contact');
});
