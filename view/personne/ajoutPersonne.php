<?php ob_start(); ?>

<h1>Ajout Personne</h1>

<div>
    <p>Ajouter une personne</p>
    <form action="index.php?action=ajoutPersonne" method="post">
        <p>
            <label>
                Prénom :
                <input type="text" name="prenomPersonne">
            </label>
        </p>
        <p>
            <label>
                Nom :
                <input type="text" name="nomPersonne">
            </label>
        </p>
        <p>
            <label>
                Sexe :
                <input type="text" name="sexePersonne">
            </label>
        </p>
        <p>
            <label>
                Date de naissance :
                <input type="date" name="dateNaissancePersonne">
            </label>
        </p>
        
        <p>
            <label>Métier</label>
            <select name="metier">
                <option value="">Choix</option>
                <option value="acteur">Acteur</option>
                <option value="realisateur">Réalisateur</option>
            </select>
        </p>
        <p>
            <label>
                <input type="submit" name="submit" value="Ajouter">
            </label>
        </p>
    </form>
</div>
                


<?php

$titrePage = "Ajout Personne";
$contenu = ob_get_clean(); 
require "view/template.php";
?>