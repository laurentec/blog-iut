<?php
define('PAGINATION', 3);
define('MON_APP', 'MON BLOG');
// Récupération des derniers billets
include_once('modele/billet/billet.php');
$vue='index';

//Ajout billet en base
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
	  ajouter_billet($_POST['billet'], $_POST['contenu']);
    }
//Modification d'un billet
	 
//Suppression d'un billet
	elseif ($_POST['action'] == 'delete') {
	delete_billet($_POST['id']);
    } 
//Editer le contenu du billet
	elseif ($_POST['action'] == 'edit') {
	 edit_contenu($_POST['id'], $_POST['contenu']);
    } 
}

		// on édite le contenu du billet
       
else if ($_GET != array()) {
    // on a un seul paramètre en GET qui est entier
    // c'est qu'on souhaite rediriger
    // il faut donc rediriger vers l'URL originale
    $id = key($_GET);
    if (is_numeric($id)) {
        // on récupère le billet d'origine
        $billet = get_billet_by_id($id);
        // compteur de statistiques à mettre à jour
        //ajouter_billet($id);
		ajouter_tag_billet($id);
        // redirection
        header('Location: ' . $billet['originale']);
        exit;
    }
    else if ($_GET['action'] == 'edit') {
        # Édition du commentaire
        
        # On récupère le lien en base 
        $billet_a_modifier = get_billet_by_id(intval($_GET['id']));
    }   
    else if ($_GET['action'] == 'tag_billet') {
        # Affichage des tags de billets
        $vue = 'tag_billet';
        $tag_billet = get_tag_billet_by_billet_id(intval($_GET['id']));
        $libelles = get_libelles_by_id(intval($_GET['id']));
    } 
	}
	

$page_courante = isset($_GET['p']) ? intval($_GET['p']) : 1;
$indice = ($page_courante * PAGINATION) - PAGINATION;
$billets = get_billets($indice, PAGINATION);
$total_billet = compte_billets();

$total_pages = ceil($total_billet / PAGINATION);

foreach ($billets as $key => $billet) {
    $billets[$key]['titre'] = ($titre['id']);
    $billets[$key]['contenu'] = $contenu['contenu'];
    $date = new DateTime($billet['date_creation']);
    $billets[$key]['date'] = $date->format('d-m-Y');
}

// On affiche la page (vue)
include_once('vues/billet/' .$vue.'.php');