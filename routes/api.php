<?php

// Auth
Route::post('/auth/login', 'AuthController@apiLogin');
Route::post('/auth/logout', 'AuthController@apiLogout')->name('logout');
Route::get('/auth/user', 'AuthController@user');


Route::group(['middleware' => ['auth:api']], function () {
    // Artticles
    Route::match(['put', 'patch'], 'articles/{article}/restore', 'ArticlesController@restore');
    Route::delete('articles/{article}/force-delete', 'ArticlesController@forceDestroy');
    Route::resource('articles', 'ArticlesController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);

    // Brands
    Route::match(['put', 'patch'], 'brands/{brand}/restore', 'BrandsController@restore');
    Route::delete('brands/{brand}/force-delete', 'BrandsController@forceDestroy');
    Route::resource('brands', 'BrandsController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);

    // Categories
    Route::match(['put', 'patch'], 'categories/{category}/restore', 'CategoriesController@restore');
    Route::delete('categories/{category}/force-delete', 'CategoriesController@forceDestroy');
    Route::resource('categories', 'CategoriesController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);

    // Partners
    Route::match(['put', 'patch'], 'partners/{partner}/restore', 'PartnersController@restore');
    Route::delete('partners/{partner}/force-delete', 'PartnersController@forceDestroy');
    Route::resource('partners', 'PartnersController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);

    // Permissions
    Route::match(['put', 'patch'], 'permissions/{permission}/restore', 'PermissionsController@restore');
    Route::delete('permissions/{permission}/force-delete', 'PermissionsController@forceDestroy');
    Route::resource('permissions', 'PermissionsController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);

    // Projects
    Route::match(['put', 'patch'], 'projects/{project}/restore', 'ProjectsController@restore');
    Route::delete('projects/{project}/force-delete', 'ProjectsController@forceDestroy');
    Route::resource('projects', 'ProjectsController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);

    // Role User
    Route::match(['put', 'patch'], 'role-user/{roleUser}/restore', 'RoleUserController@restore');
    Route::delete('role-user/{roleUser}/force-delete', 'RoleUserController@forceDestroy');
    Route::resource('role-user', 'RoleUserController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);

    // Users
    Route::match(['put', 'patch'], 'users/{user}/restore', 'UsersController@restore');
    Route::delete('users/{user}/force-delete', 'UsersController@forceDestroy');
    Route::resource('users', 'UsersController', [
        'only' => [
            'index', 'store', 'show', 'update', 'destroy'
        ]
    ]);
});
