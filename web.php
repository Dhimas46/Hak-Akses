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

Route::get('/', function () {
    //return view('welcome');
    echo "Selamat Datang Dhimas";
});
Route::get('/satu', function () {
    //return view('welcome');
    echo "One";
});
Route::get('/dua', function () {
    //return view('welcome');
    echo "Two";
});
Route::get('/tiga', function () {
    //return view('welcome');
    echo "Three";
});
Route::get('/empat', function () {
    //return view('welcome');
    echo "Four";
});
Route::get('/lima', function () {
    //return view('welcome');
    echo "five";
});
Route::get('/enam', function () {
    //return view('welcome');
    echo "six";
});
Route::get('/tujuh', function () {
    //return view('welcome');
    echo "seven";
});
Route::get('/delapan', function () {
    //return view('welcome');
    echo "eight";
});
Route::get('/sembilan', function () {
    //return view('welcome');
    echo "nine";
});

//1. echo langsung nested
Route::get('/sepuluh', function () {
    //return view('welcome');
    echo "ten";
});


//2. manggil view
Route::get('/sepuluh', function () {
    return view('samid');
  //lokasi view
});

//2. manggil view
Route::get('/nemplate', function () {
    return view('template');
  //lokasi view
});
Route::get('/CleaningService', function () {
    return view('tables');
  //lokasi view
});


//Manggil Controller
Route::get('/usang', 'UsangController@index');
/* file controller namanya usangController
    nama url usang
    index nama functionnya
*/
Route::resource('kontak', 'Kontak');

Route::get('/', function(){
  return view('index');
});

Route::get('/','kab@index');
Route::resource('kab', 'Kab');
   Route::get('/', function(){
     return view('index');
   });
   Route::get('/','jual@index');
   Route::resource('jual', 'jual');
      Route::get('/', function(){
        return view('index');
      });
            Route::get('/','beli@index');
            Route::resource('beli', 'beli');
               Route::get('/', function(){
                 return view('index');
               });
               Route::get('/','bara@index');
               Route::resource('bara', 'bara');
                  Route::get('/', function(){
                    return view('index');
                  });


Route::get('/login', 'Login@index');
Route::post('login/cek', 'Login@cek');
Route::get('/', 'Dashboard@index');
Route::get('/logout','login@logout');


Route::get('/CleaningService', 'CleanerController@tables');
