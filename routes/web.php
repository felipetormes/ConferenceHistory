    <?php

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

   // Route::get('/', function () {
      //  return view('welcome');
   // });

    Route::resource('/', 'AppController');

    Route::resource('authors', 'AuthorController');

    Route::resource('papers', 'PaperController');
    
    Route::get('institutions', 'InstitutionController@index');
    
    Route::get('search', 'AppController@search');
