<?php
/* Web Routes */

use App\Mail\ContactMessageCreated;
//Route de administration
Route::group(['prefix'=>'admins','middleware'=>'utilisateur'],function(){
	
	Route::get('/','AdminsController@dashbord')->name('Home');
	Route::post('/','AdminsController@dashbord')->name('Home');
	Route::get('/index','AdminsController@dashbord')->name('Index');
	Route::post('/index','AdminsController@dashbord')->name('Index');
	//Candidats
	Route::get('/candidat','AdminsController@showCandidat')->name('candidat');
	Route::post('/candidat','AdminsController@modifierCandidat')->name('candidat');
	Route::get('/listcandidat','AdminsController@getAllCandidats')->name('listcandidat');
	Route::post('/listcandidat','AdminsController@getAllCandidats')->name('listcandidat');
	Route::delete('/deleteCandidat/{id}','AdminsController@deleteCandidats')->name('deleteCandidat');
	
	
	//Anniversaires
	Route::get('/anniversaire','AdminsController@showAnniversaire')->name('anniversaire');
	Route::post('/anniversaire','AnnivController@modifierAnniv')->name('anniversaire');
	Route::get('/listanniv','AdminsController@getAllAnniversaires')->name('listanniv');
	Route::post('/listanniv','AdminsController@getAllAnniversaires')->name('listanniv');
	Route::delete('/deleteAnniversaire/{id}','AdminsController@deleteAnniv')->name('deleteAnniversaire');
	//Recompenses
	Route::get('/recompense','AdminsController@showRecompense')->name('recompense');
	Route::post('/recompense','AnnivController@ajoutmodifRecompense')->name('recompense');
	Route::get('/listrecompense','AdminsController@getAllRecompenses')->name('listrecompense');
	Route::post('/listrecompense','AdminsController@getAllRecompenses')->name('listrecompense');
	Route::delete('/deleteRecompense/{id}','AdminsController@deleteRecompense')->name('deleteRecompense');
	//Amis
	Route::get('/ami','AdminsController@showAmi')->name('ami');
	Route::post('/ami','AmisController@ajouterModifierAmis')->name('ami');
	Route::get('/listami','AdminsController@getAllAmis')->name('listami');
	Route::post('/listami','AdminsController@getAllAmis')->name('listami');
	Route::delete('/deleteAmi/{id}','AdminsController@deleteAmis')->name('deleteAmi');

});

Route::get('/admins/login','AdminsController@showLogin');
Route::post('/admins/login','AdminsController@connexion');
//Route::get('envoyermessage','CandidatsController@envoyermessage')->name('envoyermessage') commenter;

//Route Anniversaire
Route::get('/admins/genereranniv', 'AnnivController@genererAnniv')->name('genereranniv');
Route::post('/admins/genereranniv', 'AnnivController@genererAnniv')->name('genereranniv');

#Route::any({teste}','IndexController@comptaRebour')->where(['teste'=>'/\/\\S+/']);

//Route Amis
Route::get('/amis', 'AmisController@showAmis');
Route::get('/ajouteramis','AmisController@showAjouterAmis');
Route::post('/ajouteramis', 'AmisController@ajouterModifierAmis');
Route::post('/amis', 'AmisController@supprimerAmis')->name('amis');
Route::get('/choixamis', 'AmisController@showChoixAmis');
Route::post('/listeamis', 'AmisController@showListeAmis');
Route::get ('/listeamis', 'AmisController@showListeAmis');

//Route Candidats
//Route::get('/testCode', 'CandidatsController@testCode')->name('testCode');

Route::get('/admins/ajoutcandidat', 'CandidatsController@traitementmessage')->name('ajoutcandidat');
Route::post('/admins/ajoutcandidat','CandidatsController@ajouterCandidat')->name('ajoutcandidat');
Route::get('/profil', 'CandidatsController@profil');
Route::get ('/modifeprofile', 'CandidatsController@showModifProfil');
Route::post('/modifeprofile',['as' => 'modifeprofile',	'uses' => 'CandidatsController@modifProfil']);
Route::post('/identifiantoublier', 'CandidatsController@recupererIdentif');
Route::post('/mdpassoublier', 'CandidatsController@recupererMotPass');

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
//Route::get('/', 'PageController@comptaRebour');

Route::get('/','PageController@showIndex');
Route::post('/','PageController@showIndex');
Route::get ('/vuedetest', 'PageController@showVueDeTest');
Route::post ('/vuedetest', 'PageController@showVueTest');
Route::get ('/index', 'PageController@showIndex');
Route::post ('/index', 'PageController@showIndex');
Route::get ('/gallery', 'PageController@showGallery');
Route::get('/description', 'PageController@description');
Route::get ('/mdpassoublier', 'PageController@showMDPassOublier');
Route::get ('/modifiermdpass', 'PageController@showModifMDPass');
Route::get ('/identifiantoublier','PageController@showIdOublier');
Route::get ('/icons', 'PageController@showIcons');
Route::get ('/souscritsms', 'PageController@showSoucritSms');
Route::get ('/indexajax', 'PageController@ajaxIndex');//Requêtes ajax
Route::post ('/indexajax', 'PageController@ajaxIndex');//Requêtes ajax

//Route vote & Classement
Route::get('/admins/ajoutvote', 'CandidatsController@addVote')->name('ajoutvote');
Route::post('/admins/ajoutvote','CandidatsController@addVote')->name('ajoutvote');
Route::get('/classement', 'ClassementController@showClassement');
//Route::get('/monrang', 'ClassementController@monRang');commenter
Route::get('/monrang/{lecodecandidat}', 'ClassementController@monRang');

//Route::get('/testRang', 'ClassementController@testerRang')->name('testRang')commenter;


