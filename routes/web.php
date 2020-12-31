<?php

Route::get('/', function()
{
    return view('welcome');
});

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/json', 'ProdutoController@listaJSON');

Route::get(
    '/produtos/mostra/{id}', 'ProdutoController@mostra'
)->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/produtos/editar/{id}', 'ProdutoController@editar');

Route::post('/produtos/alterar/{id}', 'ProdutoController@alterar');