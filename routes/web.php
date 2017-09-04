<?php


Route::get('/', 'PagesController@home')->name('home');
Route::get('/posts/create', 'PagesController@create');
Route::get('/posts/{post}', 'PagesController@show');
Route::post('/posts', 'PagesController@store');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');


Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');



