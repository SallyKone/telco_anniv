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

Route::get('/', function () {
    return view('index');
});

Route::name('profil_path')->get('/profil', 'ProfilController@profil');

Route::name('description_path')->get('/description', 'DescriptionController@description');

Route::name('contact_path')->get('/contact', 'ContactController@Contact');

Route::get ('/index', 'IndexController@showIndex');
Route::get ('/amis', 'AmisController@showAmis');
Route::get ('/codes', 'CodesController@showCodes');
Route::get ('/connexion', 'ConnexionController@showConnexion');
Route::get ('/mot', 'MotController@showMot');
Route::get ('/change', 'ChangeController@showChange');
Route::get ('/identite', 'IdentiteController@showIdentite');
Route::get ('/afterlogin', 'AfterloginController@showAfterlogin');
Route::get ('/modifeprofile', 'ModifeprofileController@showModifeprofile');
Route::get ('/ajouteramis', 'AjouteramisController@showAjouteramis');
Route::get ('/listeamis', 'ListeamisController@showListeamis');

Route::get ('/classement', 'ClassementController@showClassement');
Route::get ('/gallery', 'GalleryController@showGallery');
Route::get ('/icons', 'IconsController@showIcons');

Route::get ('/sms', 'SmsController@showSms');
