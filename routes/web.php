<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/resume', function () {
    return view('resume-intro');
});

Route::get('/', 'CompareForms\ListController@index')->name('compare.list');

Route::group([
    'prefix' => '{locale}',
    'name' => 'compare.',
    'namespace' => 'CompareForms',
    'where' => ['locale' => '^(en_US|de_DE)$'],
    'middleware' => 'setlocale'], function() {

        Route::group([
            'prefix' => '/dynamic',
            'name' => 'dynamicForms.',
        ], function() {
            Route::match(['get', 'post'], '/add', 'DynamicFormsExampleController@add')->name('compare.dynamicForms.add');
            Route::match(['get', 'post'], '/edit/{id}', 'DynamicFormsExampleController@edit')
                ->where(['id'=>'[0-9]+'])
                ->name('compare.dynamicForms.edit');
        });
        
        Route::group([
            'prefix' => '/laravel',
            'name' => 'laravel.',
        ], function() {
            Route::get('/create', 'LaravelExampleController@add')->name('compare.laravel.create');
            Route::get('/{id}/edit', 'LaravelExampleController@edit')->where(['id'=>'[0-9]+'])->name('compare.laravel.edit');
            Route::post('/', 'LaravelExampleController@store')->name('compare.laravel.store');
            Route::put('/{id}', 'LaravelExampleController@update')->where(['id'=>'[0-9]+'])->name('compare.laravel.update');
        });
});

Route::group([
    'prefix' => 'laravel',
    'name' => 'laravel.',
    'namespace' => 'CompareForms',
], function() {
    Route::delete('/{id}', 'LaravelExampleController@delete')->where(['id'=>'[0-9]+'])->name('compare.laravel.delete');
});
