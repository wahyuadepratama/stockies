<?php

Auth::routes();
Route::get('home', 'HomeController@index');
Route::get('home/profile', function(){ return "On Progress..";} );
Route::get('home/message/{id}', 'HomeController@showMessage');
Route::get('home/message/delete/{id}', 'HomeController@deleteMessage');

Route::get('katalog', 'PhotoController@indexFavorite');
Route::get('katalog/{id}', 'PhotoController@showCategory');
Route::post('katalog/search', 'PhotoController@searchKeyword');
Route::get('gallery', 'PhotoController@index');
Route::get('detail/{slug}', 'PhotoController@show');
Route::post('comment/save/{id}', 'CommentController@save');

Route::get('cart','CartController@index');
Route::post('cart','CartController@store');
Route::get('cart/delete/{id}','CartController@destroy');

Route::get('pembayaran', function(){ return view('guest.pembayaran'); });
Route::post('pembayaran/save', 'CartController@save');
Route::group(['middleware' => 'waiting'], function(){
  Route::get('pembayaran/konfirmasi/{id}', 'CartController@konfirmasi');
  Route::post('pembayaran/konfirmasi/store','CartController@uploadBukti');
});
Route::group(['middleware' => 'paid'], function(){
  Route::get('pembayaran/konfirmasi/selesai/{id}', 'CartController@selesai');
});

Route::get('about', function (){ return view('guest.about'); });
Route::get('faq', function (){ return view('guest.faq'); });

//-------------- Auth for PhotoController ------------//
Route::group(['middleware' => 'auth'], function(){
    Route::post('photo/store', 'PhotoController@store');
    Route::get('like/{photo}', 'PhotoController@saveLike');
    Route::get('dislike/{photo}', 'PhotoController@destroyLike');
    Route::get('upload','PhotoController@indexUpload');
});
//-------------- End of auth for PhotoController ------------//

//------------ Halaman admin --------------//
Route::get('stockies-admin', 'AdminController@index');

Route::get('admin/transaction', 'AdminController@indexTransaction');
Route::get('admin/transaction/approve/{id}/{id_user}', 'AdminController@approveTransaction');
Route::get('admin/transaction/cart/{id}', 'AdminController@indexCart');

Route::get('admin/keyword-kategori', 'AdminController@keywordKategori');
Route::post('admin/keyword/store', 'AdminController@keywordStore');
Route::post('admin/kategori/store', 'AdminController@kategoriStore');
Route::post('admin/keyword/delete/{id}', 'AdminController@keywordDestroy');
Route::post('admin/kategori/delete/{id}', 'AdminController@kategoriDestroy');

Route::get('admin/photo-management', 'AdminController@photoManagement');
Route::post('admin/photo-management/approve/{id}', 'AdminController@approve');
Route::get('admin/photo-management/refuse/{id}', 'AdminController@refuse');
Route::post('admin/photo-management/delete/{id}', 'AdminController@photoDestroy');

Route::post('admin/user-management/delete/{id}','AdminController@deleteUser');
Route::post('admin/user-management/restore/{id}','AdminController@restoreUser');
Route::get('admin/user-management', 'AdminController@getAllUser');

Route::get('admin/message','AdminController@indexMessage');
Route::post('admin/message/send','AdminController@sendMessage');

Route::get('admin/comment','AdminController@indexComments');
Route::post('admin/comment/{id}','AdminController@deleteComments');
//------------ End of Halaman admin --------------//

// For first landing Page
Route::get('/', function () {
  $photo = App\Models\Photo::active()
               ->where('active', 1)
               ->orderBy('created_at', 'desc')
               ->take(9)
               ->get();
  return view('guest.index')->with('photo',$photo);
});
