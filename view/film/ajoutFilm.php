<?php ob_start();
?>

<h1>Ajout film</h1>


<div>
    <p>Ajouter un film</p>
    <form action="index.php?action=ajoutFilm" method="post">
        <p>
            <label>
                Titre :
                <input type="text" name="film_titre" value="">
            </label>
        </p>
        <p>
            <label>
                Note :
                <input type="number" name="film_note" min="0" value="">
            </label>
        </p>
        <p>
            <label>
                Durée en minutes :
                <input type="number" name="film_duree" value="">
            </label>
        </p>
        <p>
            <label>
                Date de sortie :
                <input type="date" name="film_date_sortie" value="">
            </label>
        </p>
        <p>
            <legend>Genre(s) :</legend>
            <?php foreach($requeteListeGenres->fetchAll() as $genre){ ?>
                    <input type="checkbox" id="<?= $genre["id_genre"] ?>" name="genres[]" value="<?= $genre["id_genre"] ?>">
                    <label for="<?= $genre["id_genre"] ?>"><?= $genre["genre_libelle"]?></label><br>
            <?php } ?>
        </p>
        <p>
                <label> Résumé : </label>
                <textarea id="synopsis" name="film_synopsis" rows="5" cols="33" value=""></textarea>
        </p>
        <p>
            <label for="realisateur-choix">Réalisateur</label>
            <select name="id_realisateur" id="realisateur-choix">
                <option value="">Choix</option>
                <?php foreach($requeteListeRealisateurs->fetchAll() as $realisateur){ ?>
                    <option value="<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["personne_prenom"]. " ".$realisateur["personne_nom"] ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="film_affiche">Affiche :</label>
            <input type="text" name="film_affiche" value="" />
        </p>
        <p>
            <label>
                <input type="submit" name="submit" value="Ajouter">
            </label>
        </p>
    </form>

    
</div>




<?php

$titrePage = "Ajout film";
$contenu = ob_get_clean(); 
require "view/template.php";
?>



