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
// Route houwe URL


// Route Paremetre 
Route::get('/landing', function () {
    return view('landing');
});




/*route name
Route::namespace('Front')->group(function () {
    //all route only access controler or methode in folder name Front
    Route::get('users','UserController@showUserName');
});
/*Route:: group(['prefix'=>'users','middleware'=>'auth'],function(){
    Route::get('/',function(){
        return'work';
    });
});
Route::get('check',function(){
    return 'middleware';
})-> middleware('auth');
*/
// second=>esme uali bibayine 3nd url
//Route::get('second','Admin\SecondController@showString');
 //Aw hek fina nectoub

//Route::get('users','UserController@index'); 


Route::resource('news','NewsController');


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')-> middleware('verified');

Route::get('/',function(){
    return 'Home';
});

Route::get('/redirect/{service}', 'SocialController@redirect');
Route::get('/callback/{service}', 'SocialController@callback');
