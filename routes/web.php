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

    //Route::resource('papers', 'PaperController');
    
    //Route::get('institutions', 'InstitutionController@index');
    
    Route::get('search/author', 'AuthorController@search');

    Route::get('search/author/{id}', 'AuthorController@papers');

    Route::get('search/paper', 'PaperController@search');

    Route::get('search/paper/{id}', 'PaperController@authors');

    Route::get('search/conference', 'ConferenceController@search');

    Route::get('search/conference/{id}', 'ConferenceController@editions');

    Route::get('search/conference/edition/{id}', 'ConferenceController@papers');
