<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/logout', function(){
    return 'User logout';
});

Route::get('/catalog', function(){
    return view('catalog.index');
});

Route::get('/catalog/show/{id}', function(string $id){
    return view('catalog.show', array('id'=>$id));
});

Route::get('/catalog/create', function(){
    return view('catalog.create');
});

Route::get('/catalog/edit/{id}', function(string $id){
    return view('catalog.edit', array('id'=>$id));
});