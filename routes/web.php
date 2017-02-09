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

    Route::resource('/hehe', 'KeywordController');

    Route::resource('/', 'AppController');

    //Route::resource('papers', 'PaperController');
    
    Route::get('search/author', 'AuthorController@search');

    Route::get('search/author/{id}', 'AuthorController@papers');

    Route::get('search/paper', 'PaperController@search');

    Route::get('search/paper/{id}', 'PaperController@authors');

    Route::get('search/conference', 'ConferenceController@search');

    Route::get('conference/{id}', 'ConferenceController@editions');

    Route::get('search/conference/edition/{id}', 'ConferenceController@papers');

    Route::get('search/institution', 'InstitutionController@search');

    Route::get('search/institution/authors/{id}', 'InstitutionController@authors');

    Route::get('search/institution/papers/{id}', 'InstitutionController@papers');

Auth::routes();

Route::get('/home', 'HomeController@index');

    Route::get('/admin', [
        'uses' => 'AppController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['admin']
    ]);

    Route::post('/admin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);