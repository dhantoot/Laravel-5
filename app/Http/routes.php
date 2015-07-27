<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'BookController@index');

Route::get('/showform','BookController@showForm');

//Route::post('/insertToBooks','BookController@insertToBooks');

Route::get('/showUpdateForm/{id}','BookController@showUpdateForm');
//Route::post('/updateBook/{id}','BookController@updateBook');

Route::get('/showDeleteForm/{id}','BookController@showDeleteForm');
//Route::post('/deleteBook/{id}','BookController@deleteBook');

Route::get('/showCommentForm','BookController@showCommentForm');



Route::group(['prefix' => 'api'],function(){

  Route::group(['prefix' => 'books'],function(){
		Route::get('/','BookController@getAllBooksAPI');
	});

  Route::group(['prefix' => 'insertbook'],function(){
		Route::post('/','BookController@insertToBooksAPI');
	});

  Route::group(['prefix' => 'updateBook'],function(){
    Route::post('/{id}','BookController@updateBookAPI');
  });

  Route::group(['prefix' => 'deleteBook'],function(){
    Route::post('/{id}','BookController@deleteBookAPI');
  });

  Route::group(['prefix' => 'backtoindex'],function(){
    Route::get('/','BookController@index');
  });


});
