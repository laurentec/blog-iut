<?php
function get_billets($indice = 0, $pagination = 5)
{
    global $bdd;
    // classement par date des billets
    $req = $bdd->prepare('
        SELECT billet.* ,(
				SELECT COUNT (*)
				FROM tag_billet
				WHERE tag.tag_id=billet.id
				) AS total
			FROM billet
				ORDER BY date_creation DESC
        LIMIT ' . $indice . ', ' . $pagination);
    $req->execute();
    $billets = $req->fetchAll();
    
    return $billets;
}

	//Nombre de billets
function compte_billets() 
{
    global $bdd;        
    $req = $bdd->prepare('
        SELECT COUNT(*)
        FROM billet
        ');
    $req->execute();
    $total = $req->fetchColumn();  
    return $total;
}
	//Dénombrer les billets
function get_tag_billet_by_billet_id($id) 
{
    global $bdd;       
    $req = $bdd->prepare('
        SELECT billet.* , (
                SELECT COUNT(*)
                FROM tag_billet
                WHERE tag_id.tag_id = billet.id
            ) AS total
        FROM billet
        WHERE billet.id = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $billet = $req->fetch();   
    return $billet;
}

function get_libelles_by_id($id) 
{
    global $bdd;
        
    $req = $bdd->prepare('
        SELECT DISTINCT(libelle)
        FROM tag
        WHERE id = :id
        AND libelle != ""
    ');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $referers = $req->fetchAll();    
    return $libelles;
}

function get_billet_by_id($id) 
{
    global $bdd;

    $req = $bdd->prepare('
        SELECT *
        FROM billet
        WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $billet = $req->fetch();
    
    return $billet;
}
	// Ajouter un billet en base
function ajouter_billet($billet, $contenu= '')
{
    global $bdd;

    $req = $bdd->prepare('
        INSERT INTO billet
        (titre, contenu, publie)
        VALUES (:titre, :contenu, :publie)');
	//$date=date('Y-m-d H:i:s');
    $req->bindParam(':titre', $titre, PDO::PARAM_STR);   
    $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $req->bindParam(':publie', $publie, PDO::PARAM_INT);
	//$req->bindParam(':date', date('y-m-d H:i:s'), PDO::PARAM_STR);
    
	return $req->execute();
}
	// Ajouter les tags en base
function ajouter_tag_billet($tag_id, $billet_id = '')
{
    global $bdd;

    $req = $bdd->prepare('
        INSERT INTO tag_billet
        (tag_id, billet_id)
        VALUES (:tag_id, :billet_id)
        ');
    $req->bindParam(':tag_id', $tag_id, PDO::PARAM_int);
    $req->bindParam(':billet_id',$billet_id, PDO::PARAM_STR);
    return $req->execute();
}
	//Ajouter le libelle en base
function ajouter_tag($libelle = '') //A verifier //
{
    global $bdd;

    $req = $bdd->prepare('
        INSERT INTO tag
        (libelle)
        VALUES (:libelle)');

    $req->bindParam(':libelle', $libelle, PDO::PARAM_STR);
    return $req->execute(); 
}
function delete_billet($id) 
{
    global $bdd;

    $req = $bdd->prepare('
        DELETE FROM billet
        WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    
    return $req->execute(); 
}
function edit_contenu($id, $contenu) 
{
    global $bdd;
    $req = $bdd->prepare('
        UPDATE billet
        SET contenu = :contenu
        WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);    
    return $req->execute(); 
}