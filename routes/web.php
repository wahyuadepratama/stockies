<?php

Auth::routes();
Route::get('home', 'HomeController@index');

Route::get('katalog', 'PhotoController@index');
Route::get('katalog/{id}', 'PhotoController@showCategory');
Route::post('katalog/search', 'PhotoController@searchKeyword');
Route::get('detail/{slug}', 'PhotoController@show');

Route::group(['middleware' => 'auth'], function(){
    Route::post('photo/store', 'PhotoController@store');
    Route::get('like/{photo}', 'PhotoController@saveLike');
    Route::get('dislike/{photo}', 'PhotoController@destroyLike');
});

//------------ Halaman admin --------------//
Route::get('stockies-admin', 'AdminController@index');
Route::get('admin/user-management', 'AdminController@getAllUser');

Route::get('admin/keyword-kategori', 'AdminController@keywordKategori');
Route::post('admin/keyword/store', 'AdminController@keywordStore');
Route::post('admin/kategori/store', 'AdminController@kategoriStore');
Route::post('admin/keyword/delete/{id}', 'AdminController@keywordDestroy');
Route::post('admin/kategori/delete/{id}', 'AdminController@kategoriDestroy');

Route::get('admin/photo-management', 'AdminController@photoManagement');

Route::post('admin/user-management/delete/{id}','AdminController@deleteUser');
Route::post('admin/user-management/restore/{id}','AdminController@restoreUser');
//------------ End of Halaman admin --------------//

// For first landing Page
Route::get('/', function () {
  $photo = App\Models\Photo::where('active', 0)
               ->orderBy('created_at', 'desc')
               ->take(9)
               ->get();
  return view('guest.index')->with('photo',$photo);
});
