<?php
Route::group([
    'namespace' => 'Job',
    'as'        => 'jobs.',
], function () {
    Route::resource('jobs', 'JobsController', [
        'names' => [
            'index'   => 'index',
            'create'  => 'create',
            'store'   => 'store',
            'show'    => 'show',
            'edit'    => 'edit',
            'update'  => 'update',
            'destroy' => 'destroy',
        ],
    ]);

    Route::group([
        'middleware' => 'needs-complete-info',
        'prefix'     => 'job',
    ], function () {
        Route::get('/enroll/{id}', 'EmployController@enroll')->name('enroll');
        Route::get('/hire/{id}','EmployController@hire')->name('hire');
    });
});