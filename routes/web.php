<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/registros',function(){
    return view('registros.usuarios');
});

Route::get('/perfil_Usuario',function(){
    return view('perfil_Usuario.perfil');
});
Route::get('/show_Producto',function(){
   return view('show_Producto.show'); 
});
Route::post('img'.'productosController@img');

Route::resource('usuarios','usuariosController');

Route::resource('log','LogController');

Route::get('/', 'productosController@index');

Route::get('perfil_Usuario','productosController@perfil');

Route::resource('producto','productosController');

Route::resource('imagen','imagenController');

