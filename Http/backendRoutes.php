<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/galleria'], function (Router $router) {
    $router->bind('galleries', function ($id) {
        return app('Modules\Galleria\Repositories\GalleriaRepository')->find($id);
    });
    get('galleries', ['as' => 'admin.galleria.galleries.index', 'uses' => 'GalleriaController@index']);
    get('galleries/create', ['as' => 'admin.galleria.galleries.create', 'uses' => 'GalleriaController@create']);
    post('galleries', ['as' => 'admin.galleria.galleries.store', 'uses' => 'GalleriaController@store']);
    get('galleries/{galleries}/edit', ['as' => 'admin.galleria.galleries.edit', 'uses' => 'GalleriaController@edit']);
    put('galleries/{galleries}/edit', ['as' => 'admin.galleria.galleries.update', 'uses' => 'GalleriaController@update']);
    delete('galleries/{galleries}', ['as' => 'admin.galleria.galleries.destroy', 'uses' => 'GalleriaController@destroy']);
// append

});
