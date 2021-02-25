<?php

//Admin Route 

Route::group(['as' => 'admin.'],function (){
	Auth::routes(['register' => false]);

	Route::group(['middleware' => 'auth:admin'], function(){
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');        
        Route::get('/change/password', 'ChangePasswordController@index')->name('change-password');        
        Route::post('/change/password/post', 'ChangePasswordController@changePassword')->name('change-password.post');        

        // User routes
        Route::group(['prefix' => 'user','as' => 'user.'], function(){
        	Route::get('list', 'UserController@index')->name('list');
            Route::post('store', 'UserController@store')->name('store');
            Route::post('edit', 'UserController@edit')->name('edit');
            Route::post('update', 'UserController@update')->name('update');
            Route::post('delete', 'UserController@delete')->name('delete');
            Route::post('change/status', 'UserController@changeStatus')->name('change-status');
        });

        // Faq routes
        Route::group(['prefix'=>'faq','as' => 'faq.'],function(){
            Route::get('list','FaqController@index')->name('list');
            Route::post('store','FaqController@store')->name('store');
            Route::post('edit','FaqController@edit')->name('edit');
            Route::post('update','FaqController@update')->name('update');
            Route::post('delete','FaqController@delete')->name('delete');
        });

        // Image routes
        Route::group(['prefix'=>'image','as' => 'image.'],function(){
            Route::get('list','ImageController@index')->name('list');
            Route::post('store','ImageController@store')->name('store');
            Route::post('edit','ImageController@edit')->name('edit');
            Route::post('update','ImageController@update')->name('update');
            Route::post('delete','ImageController@delete')->name('delete');
        });

        // Cms routes
        Route::group(['prefix'=>'cms','as' => 'cms.'],function(){
            Route::get('list','CmsController@index')->name('list');
            Route::get('create','CmsController@create')->name('create');
            Route::post('store','CmsController@store')->name('store');
            Route::get('{id}/edit','CmsController@edit')->name('edit');
            Route::post('update','CmsController@update')->name('update');
            Route::post('delete','CmsController@delete')->name('delete');
        });
    });
});

