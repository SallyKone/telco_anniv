<?php
/* Web Routes */
//Route de maintenance
use App\Mail\ContactMessageCreated;
Route::get('/', 'PageController@comptaRebour');
#Route::any('{teste?}','IndexController@comptaRebour')->where(['teste'=>'/\\S+/']);

//Route Amis
Route::get('/amis', 'AmisController@showAmis');
Route::get('/ajouteramis', 'AmisController@showAjouterAmis');
Route::post('/ajouteramis',['as' => 'ajouteramis','uses'=>'AmisController@ajouterAmis']);
Route::get('/amis', 'AmisController@supprimerAmis');
Route::post('/amis', 'AmisController@supprimerAmis')->name('amis');

Route::get('/choixamis', 'AmisController@showChoixAmis');
Route::post('/listeamis', 'AmisController@showListeAmis');
#Route::post ('/listeamis', 'AmisController@modifierAmis');
#Route::post ('/listeamis', 'AmisController@supprimerAmis');

Route::get ('/listeamis', 'AmisController@showListeAmis');
//Route::post ('/listeamis', 'AmisController@modifierAmis');
Route::post('supprimeramis', 'AmisController@supprimerAmis')->name('supprimeramis');

//Route Candidats
Route::get('/profil', 'CandidatsController@profil');
Route::get ('/modifeprofile', 'CandidatsController@showModifProfil');
Route::post('/modifeprofile',['as' => 'modifeprofile',	'uses' => 'CandidatsController@modifProfil']);

//Route Anniversaire

//Route Connexion
Route::get ('/connexion', 'ConnexionController@showConnexion');
Route::post ('/connexion', 'ConnexionController@connecter');
Route::get ('/deconnexion', 'ConnexionController@deconnecter');
Route::post ('/deconnexion', 'ConnexionController@deconnecter');

//Route Contact
Route::get('/contact', 'ContactController@contact');
Route::post('/contact',['uses'=>'ContactController@envoiMail','as'=>'contact_path']);
Route::get ('/test-email', function() {
	return new ContactMessageCreated ('kone','misskone690@gmail.com','40157925','bienvenu');
});

//Route Pages pour afficher les standards et les formulaires
Route::get ('/vuedetest', 'PageController@showVueDeTest');
Route::post ('/vuedetest', 'PageController@showVueTest');
Route::get ('/index', 'PageController@showIndex');
Route::post ('/index', 'PageController@showIndex')->name('home');
Route::get ('/gallery', 'PageController@showGallery');
Route::get('/description', 'PageController@description');
Route::get ('/mdpassoublier', 'PageController@showMDPassOublier');
Route::get ('/modifiermdpass', 'PageController@showModifMDPass');
Route::get ('/identifiantoublier','PageController@showIdOublier');
Route::get ('/icons', 'PageController@showIcons');
Route::get ('/souscritsms', 'PageController@showSoucritSms');

//Route Classement
Route::get ('/classement', 'ClassementController@showClassement');
