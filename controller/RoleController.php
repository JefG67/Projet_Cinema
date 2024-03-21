<?php 


namespace Controller;
use Model\Connect;

class RoleController {

    public function accueil() {
        require "view/accueil.php";
    }

    public function supprimerRole($id){


        $pdo = Connect::seConnecter();

        $requete = $pdo->prepare("
            DELETE 
            FROM role
            WHERE id_role = :id
        ");

        $requete->execute([
            "id"=>$id
        ]);

    }
}