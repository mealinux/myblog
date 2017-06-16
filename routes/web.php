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

//------------------ADMIN ROUTE-------------------------//
Route::group(['middleware' => ['web']], function(){
    Route::group(['prefix' => 'admin'], function(){

      Route::get('master-loginasform', 'Admin\UserController@loginFormGet');
      Route::post('master-loginasform', 'Admin\UserController@loginFormPost');

    });
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['prefix' => 'admin'], function(){

        Route::get('menuler', 'Admin\MenuController@AllMenuGet');

        Route::get('menuler/düzenle/{id?}', 'Admin\MenuController@MenuUpdateGet');
        Route::post('menuler/düzenle/{id?}', 'Admin\MenuController@MenuUpdatePost');

        Route::get('menuler/sil/{id?}', 'Admin\MenuController@MenuDelete');
        Route::get('menu-ekle', 'Admin\MenuController@MenuGet');
        Route::post('menu-ekle', 'Admin\MenuController@MenuPost');

        Route::get('yazilar', 'Admin\ArticleController@allArticleGet');
        Route::get('yazilar/sil/{id?}', 'Admin\ArticleController@ArticleDeleteGet');
        Route::get('yazilar/düzenle/{id?}', 'Admin\ArticleController@ArticleUpdateGet');
        Route::post('yazilar/düzenle/{id?}', 'Admin\ArticleController@ArticleUpdatePost');

        Route::get('liste-yazi-ekle', 'Admin\ArticleController@addArticleGet');
        Route::post('liste-yazi-ekle', 'Admin\ArticleController@addArticlePost');

        Route::get('yazilar/düzenle/b/{id?}', 'Admin\ArticleController@ArticleUpdateGet');
        Route::post('yazilar/düzenle/b/{id?}', 'Admin\ArticleController@ArticleUpdatePost');

        Route::get('bir-yazi-ekle', 'Admin\ArticleController@addOneArticleGet');
        Route::post('bir-yazi-ekle', 'Admin\ArticleController@addArticlePost');

        Route::get('kategoriler', 'Admin\CategoryController@allCategoryGet');
        Route::get('kategoriler/düzenle/{id?}', 'Admin\CategoryController@CategoryUpdateGet');
        Route::post('kategoriler/düzenle/{id?}', 'Admin\CategoryController@CategoryUpdatePost');
        Route::get('kategoriler/sil/{id?}', 'Admin\CategoryController@CategoryDeleteGet');

        Route::get('kategori-ekle', 'Admin\CategoryController@addCategoryGet');
        Route::post('kategori-ekle', 'Admin\CategoryController@addCategoryPost');

        Route::get('profil', 'Admin\ProfileController@ProfileGet');
        Route::post('profil', 'Admin\ProfileController@ProfilePost');

        Route::get('ayarlar', 'Admin\SettingController@AyarlarGet');
        Route::post('ayarlar', 'Admin\SettingController@AyarlarPost');

        Route::get('logout', 'Admin\UserController@logoutPost');

    });
});
//------------WEB ROUTE------------------------------//
Route::group(['middleware' => 'web'], function(){

    Route::get('/', 'Site\SiteController@AllMenuGet');

    Route::get('{slug}', 'Site\SiteController@EachCategoryGet');

    Route::get('d/{slug}', 'Site\SiteController@EachCategoryGet');

    Route::get('yazi/{slug}', 'Site\SiteController@OneCategoryGet');

});
