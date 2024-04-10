<?php


namespace Controller;

use Model\Connect;

class PersonneController
{

    public function accueil()
    {
        require "view/accueil.php";
    }




    //liste d'acteur nom/prenom
    public function listActeur()
    {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT 
            personne.nom AS nom, 
            personne.prenom AS prenom FROM acteur 
        INNER JOIN personne ON acteur.id_personne = personne.id_personne");


        require "view/personne/listActeur.php";
    }

    //liste des realisateurs nom/prenom
    public function listRealisateur()
    {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query("SELECT 
            personne.nom AS nom, 
            personne.prenom AS prenom FROM realisateur 
        INNER JOIN personne ON realisateur.id_personne = personne.id_personne");


        require "view/personne/listRealisateur.php";
    }

    //Detail Acteur

    public function detailActeur($id)
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT 
        CONCAT(personne.prenom, ' ',personne.nom) AS nomActeur,
        sexe,
        date_naissance 
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        WHERE acteur.id_acteur = :id
        ");

        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("SELECT 
        nom_role,
        titre_film,
        annee_de_sortie
        FROM casting
        INNER JOIN film ON casting.id_film = film.id_film
        INNER JOIN rolefilm ON casting.id_role = rolefilm.id_role
        INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
        INNER JOIN personne ON acteur.id_personne = personne.id_personne
        WHERE casting.id_acteur = :id
        ORDER BY annee_de_sortie DESC              
        ");

        $requete2->execute(["id" => $id]);

        require "view/personne/detailPersonneActeur.php";
    }


    //detail realisateur
    public function detailRealisateur($id)
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("SELECT 
        CONCAT(personne.prenom, ' ',personne.nom) AS nomRealisateur,
        sexe,
        date_naissance 
        FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        WHERE realisateur.id_realisateur = :id
        ");

        $requete->execute(["id" => $id]);

        $requete2 = $pdo->prepare("SELECT 
        titre_film,
        annee_de_sortie
        FROM film
        WHERE film.id_realisateur = :id
        ORDER BY annee_de_sortie DESC
        ");

        $requete2->execute(["id" => $id]);

        require "view/personne/detailPersonneRealisateur.php";
    }
    //supprimer un acteur
    public function supprimerActeur($id)
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("DELETE 
        FROM acteur
        WHERE id_acteur = :id
        ");
        $requete->execute(["id" => $id]);

        header("Location:index.php?action=listActeur");
        die;
    }

    //supprimer un realisateur
    public function supprimerRealisateur($id)
    {

        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("DELETE 
        FROM realisateur
        WHERE id_realisateur = :id
        ");

        $requete->execute(["id" => $id]);

        header("Location:index.php?action=listRealisateur");
        die;
    }

    //ajout d'un realisateur et acteur
    public function ajoutPersonne()
    {

        if (isset($_POST['submit'])) {
            $prenomPersonne = filter_input(INPUT_POST, "prenomPersonne", FILTER_SANITIZE_SPECIAL_CHARS);
            $nomPersonne = filter_input(INPUT_POST, "nomPersonne", FILTER_SANITIZE_SPECIAL_CHARS);
            $sexePersonne = filter_input(INPUT_POST, "sexePersonne", FILTER_SANITIZE_SPECIAL_CHARS);
            $dateNaissancePersonne = filter_input(INPUT_POST, "dateNaissancePersonne", FILTER_SANITIZE_SPECIAL_CHARS);


            $pdo = Connect::seConnecter();
            
            // Ajout acteur 
            if ($_POST["metier"] == "acteur") {


                $requete = $pdo->prepare("INSERT INTO personne (prenom, nom, sexe, date_naissance) 
                  VALUES (:prenom, :nom, :sexe, :date_naissance)
            ");

                $requete->execute([
                    "prenom" => $prenomPersonne,
                    "nom" => $nomPersonne,
                    "sexe" => $sexePersonne,
                    "date_naissance" => $dateNaissancePersonne
                ]);


                $idPersonne = $pdo->lastInsertId();

                $requeteAjoutActeur = $pdo->prepare("INSERT INTO acteur (id_personne) VALUES (:id_personne) 
            ");

                $requeteAjoutActeur->execute([
                    "id_personne" => $idPersonne
                ]);
            } else {
                $requete = $pdo->prepare("INSERT INTO personne (prenom, nom, sexe, date_naissance) 
                  VALUES (:prenom, :nom, :sexe, :date_naissance)
            ");

                $requete->execute([
                    "prenom" => $prenomPersonne,
                    "nom" => $nomPersonne,
                    "sexe" => $sexePersonne,
                    "date_naissance" => $dateNaissancePersonne
                ]);

                $idPersonne = $pdo->lastInsertId();

                $requeteAjoutRéalisateur = $pdo->prepare("INSERT INTO realisateur (id_personne) VALUES (:id_personne) 
                    ");

                $requeteAjoutRéalisateur->execute([
                    "id_personne" => $idPersonne
                ]);
            }
        }

        require "view/personne/ajoutPersonne.php";        

    }


    public function ajoutPersonneFormulaire()
    {
        require "view/personne/ajoutPersonne.php";
    }
}
