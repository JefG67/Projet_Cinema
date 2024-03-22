<?php 


namespace Controller;
use Model\Connect;

class RoleController {

    public function accueil() {
        require "view/accueil.php";
    }



    //list des roles 
    public function listRole() {

        $pdo = Connect::seConnecter();

        $requete = $pdo->query
        ("SELECT 
            nom_role
        FROM rolefilm
        
        ");
        require "view/role/listrole.php";
        
    }


    //sup un roles    
    public function supprimerRole($id){


        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare
        ("  DELETE 
            FROM role
            WHERE id_role = :id
        ");

        $requete->execute(["id"=>$id
        ]);

    }

    //detail role
    public function detailRole($id) {  

        $pdo = Connect::seConnecter();

       
        $requete = $pdo->prepare
        ("SELECT 
            film.titre_film AS titreFilm,
            film.id_film AS idFilm,
            rolefilm.id_role AS idRole,
            personne.id_personne AS idPersonne,
            rolefilm.nom_role AS nomRole,
            CONCAT(personne.prenom, ' ',personne.nom) AS nomActeur
        FROM casting
        INNER JOIN film ON casting.id_film = film.id_film
        INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
        INNER JOIN personne ON acteur.id_personne = personne.id_personne
        INNER JOIN rolefilm ON casting.id_role = rolefilm.id_role
        WHERE casting.id_role = :id
        ");

        $requete->execute(["id" => $id]);
        require "view/role/detailRole.php";

}
    }
