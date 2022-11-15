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

Route::middleware(['XSS'])->namespace('Web')->group(function () {

    // Home Route
    Route::get('/', 'HomeController@index')->name('home');

    // Article Routes
    Route::get('/articles', 'ArticlesController@index');
    Route::get('/article/category/{slug}', 'ArticlesController@category');
    Route::get('/article/{slug}', 'ArticlesController@show')->name('article.single');

    // Video Routes
    Route::get('/videos', 'VidoesController@index');
    Route::get('/video/{slug}', 'VidoesController@show')->name('video.single');

    // Faq Routes
    Route::get('/faqs', 'FaqsController@index');
    Route::get('/faq/category/{slug}', 'FaqsController@category');
    Route::get('/faq/{slug}', 'FaqsController@show');

    // Search Route
    Route::get('/search', 'SearchController@index');

    // Contact Route
    Route::get('/contact', 'ContactController@index');
    Route::post('/contact', 'ContactController@sendMail');
});


// Auth Routes
//Auth::routes();
Auth::routes(['register' => false]);

// Admin Routes
Route::middleware(['auth:web', 'XSS'])->namespace('Admin')->prefix('admin')->group(function () {

    // Dashboard Route
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    // FAQ Routes
	Route::resource('faq-category', 'FaqCategoryController');
	Route::resource('faq', 'FaqController');

    // Article Routes
    Route::resource('article-category', 'ArticleCategoryController');
    Route::resource('article', 'ArticleController');

    // Video Routes
    Route::resource('video', 'VideoController');

    // Contact Routes
    Route::resource('contact', 'ContactController');

    // LiveChat Routes
    Route::resource('livechat', 'LiveChatController');

    // Page Setup Routes
    Route::resource('page-setup', 'PageSetupController');
    
    // Language Routes
    Route::resource('language', 'LanguageController');
    Route::get('language-default/{id}', 'LanguageController@default')->name('language.default');

    // Setting Routes
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::post('siteinfo', 'SettingController@siteInfo')->name('setting.siteinfo');
    Route::post('contactinfo', 'SettingController@contactInfo')->name('setting.contactinfo');
    Route::post('changemail', 'SettingController@changeMail')->name('setting.changemail');
    Route::post('changepass', 'SettingController@changePass')->name('setting.changepass');
    Route::post('socialinfo', 'SettingController@socialInfo')->name('setting.socialinfo');
    Route::post('customcode', 'SettingController@customCode')->name('setting.customcode');
});
