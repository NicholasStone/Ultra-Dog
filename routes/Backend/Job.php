<?php
Route::group([
    'namespace' => 'Job',
    'as' => 'jobs.'
], function () {
    Route::get('jobs','JobController@index')->name('index');
    Route::post('jobs/get','JobController@get')->name('get');
});