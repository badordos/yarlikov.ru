<?php

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('projects', 'ProjectController');
    Route::resource('albums', 'AlbumController');
    Route::resource('articles', 'ArticleController');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/projects', 'HomeController@projects')->name('projects');
Route::get('/albums', 'HomeController@albums')->name('albums');
Route::get('/album/{album}', 'HomeController@album')->name('album.frontend.show');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/article/{article}', 'HomeController@article')->name('article.frontend.show');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::post('/comment', 'CommentController@comment')->name('comment');

Route::post('/subscribe', 'EmailController@subscribe')->name('subscribe');
Route::get('/unsubscribe', 'EmailController@unsubscribe')->name('unsubscribe');
Route::post('/callback', 'EmailController@callback')->name('callback');

Route::get('/phpinfo', function () {
    phpinfo();
})->name('phpinfo')->middleware('admin');
