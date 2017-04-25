<?php

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
Route::group(['middleware' => ['web']],function(){
    
    Route::get('/',[
        'uses' => 'MainController@Home',
        'as' => 'main.home'
    ]);

    Route::group(['prefix' => 'register'],function(){

        Route::get('/users',[
            'uses' => 'MainController@UserRegister',
            'as' => 'main.signup.user'
        ]);

        Route::post('/users/save',[
            'uses' => 'MainController@UserSignUp',
            'as' => 'main.save.user'
        ]);

        Route::get('/company',[
            'uses' => 'MainController@CompanyRegister',
            'as' => 'main.signup.company'
        ]);

        Route::post('/company/save',[
            'uses' => 'MainController@CompanySignUp',
            'as' => 'main.save.company'
        ]);

    });

    Route::group(['prefix' => 'admin'],function(){

        Route::get('/profile',[
            'uses' => 'AdminController@profile',
            'as' => 'admin.profile'
        ]);

        Route::get('/dashboard',[
            'uses' => 'AdminController@dashboard',
            'as' => 'admin.dashboard'
        ]);

        Route::get('/users',[
            'uses' => 'AdminController@users',
            'as' => 'admin.list.users'
        ]);

        Route::get('/company',[
            'uses' => 'AdminController@company',
            'as' => 'admin.list.company'
        ]);

        Route::get('/delete/{id}',[
            'uses' => 'AdminController@Delete',
            'as' => 'admin.delete'
        ]);


    });
    
    Route::group(['prefix' => 'users'],function(){

        Route::get('/dashboard',[
            'uses' => 'UserController@dashboard',
            'as' => 'user.dashboard'
        ]);
        
        Route::get('/profile',[
            'uses' => 'UserController@profile',
            'as' => 'user.profile'
        ]);
                
        Route::get('/edit/{$id}',[
            'uses' => 'UserController@edit',
            'as' => 'user.edit'
        ]);
                
        Route::post('/edit/save',[
            'uses' => 'UserController@save',
            'as' => 'user.edit.save'
        ]);
        
    });
    
    Route::group(['prefix' => 'company'],function(){
        
        Route::get('/dashboard',[
            'uses' => 'CompanyController@dashboard',
            'as' => 'company.dashboard'
        ]);
        
        Route::get('/profil',[
            'uses' => 'CompanyController@profil',
            'as' => 'company.profile'
        ]);
        
        Route::get('/edit/{$id}',[
            'uses' => 'CompanyController@edit',
            'as' => 'company.edit'
        ]);
        
        Route::post('/edit/save',[
            'uses' => 'CompanyController@save',
            'as' => 'company.save'
        ]);
        
    });
    
    Route::post('/login',[
        'uses' => 'MainController@Login',
        'as' => 'main.login'
    ]);
    
    Route::get('/logout',[
        'uses' => 'MainController@Logout',
        'as' => 'main.logout'
    ]);
});