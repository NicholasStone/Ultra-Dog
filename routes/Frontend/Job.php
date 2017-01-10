<?php
Route::group([
    'namespace' => 'Job',
    'as'        => 'jobs',
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
});