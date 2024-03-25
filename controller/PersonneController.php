<?php 


namespace Controller;
use Model\Connect;

class PersonneController {

    public function accueil() {
        require "view/accueil.php";
    }




     //liste d'acteur nom/prenom
     public function listActeur() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT 
            personne.nom AS nom, 
            personne.prenom AS prenom FROM acteur 
        INNER JOIN personne ON acteur.id_personne = personne.id_personne");
                
                
        require "view/listActeur.php";
    }

    //liste des realisateurs nom/prenom
    public function listRealisateur() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT 
            personne.nom AS nom, 
            personne.prenom AS prenom FROM realisateur 
        INNER JOIN personne ON realisateur.id_personne = personne.id_personne");
                
                
        require "view/listRealisateur.php";
    }

    //Detail Acteur

    public function detailActeur($id) {
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare
        ("SELECT 
        CONCAT(personne.prenom, ' ',personne.nom) AS nomActeur,
        sexe,
        date_naissance 
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        WHERE acteur.id_acteur = :id
        ");
        
        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("
        
        
        ");

    }

}