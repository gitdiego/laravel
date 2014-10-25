<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/test/{id}',function($id){
	return Response::json(array('status'=>'200','message'=>'Hola','id'=>$id));
});

Route::get('llamando/al/controlador/{param?}','HomeController@mimetodo');

/*Route::group(array('prefix' => 'api/v1/auth/'), function() {  
    Route::post('/login', array('uses' => 'AuthController@login' ));  
});*/

/*Route::group(array('prefix'=>'api/v1', 'before' => 'auth.basic'),function(){
		Route::get('/portfolio', array('uses'=>'PortfolioController@getall'));

		Route::get('/otroejemplo',function(){
				return 'hola';
		});
});*/


Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});



Route::group(array('prefix'=>'api/v1', 'before' => 'oauth'),function(){
		Route::get('/portfolio', array('uses'=>'PortfolioController@getall'));
		
		Route::get('/autor/{param?}', 
				array('uses'=>'AutorController@getall'));

		Route::get('/recurso/{param?}', array('uses'=>'RecursoController@getall'));

		//Route::get('autor.recurso', array('uses'=>'AutorRecursoController@getall'));
		Route::resource('autor.recurso', 'AutorRecursoController',array('only' => array('index', 'show','store','update','destroy')));
		//Route::resource('recurso.materia', 'AutorRecursoController@getRecursoMateria');
		//Route::resource('autor.recurso.materia', 'AutorRecursoController@getAutorRecursoMateria');

		
});
