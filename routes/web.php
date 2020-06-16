<?php 
Route::get("/barang/json","BarangController@json");
Route::resource("/barang","BarangController");
Route::get("/kategori/json","KategoriController@json");
Route::resource("/kategori","KategoriController");
