<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
            <ul class="vertical tabs" data-responsive-accordion-tabs="tabs accordion large-accordion medium-tabs" id="example-tabs">
                <li class="tabs-title first is-active">
                    <a href="#admincontenu" aria-selected="true">Modification et Ajout de Contenu</a>
                </li>
                <li class="tabs-title">
                    <a href="#adminsupp">Suppression de Contenu</a>
                </li>
                <li class="tabs-title last">
                    <a href="#adminpass">Gestion de mot de passe</a>
                </li>
            </ul>
        </div>
        <div class="cell medium-9">
            <div class="tabs-content" data-tabs-content="example-tabs">
                <div class="tabs-panel is-active" id="admincontenu">
                    <p>
                        <input type="radio" name="radiofiche" value="modifier" onclick="changeContent('divfiche', 'null', 'index.php', 'EX=modiffiche');" /> Modifier Contenu (Spécialités, Collaborateurs, Fiches Conseils)<br>
                        <input type="radio" name="radiofiche" value="ajouter" onclick="changeContent('divfiche', 'null', 'index.php', 'EX=ajoutfiche');" /> Ajouter Contenu (Spécialités, Collaborateurs, Fiches Conseils)
                    </p>
                    <div id="divfiche">

                    </div>
                </div>
                <div class="tabs-panel" id="adminsupp">
                    <form action="inc/suppart.inc.php" method="post">
                        <fieldset class="fieldset">
                            <legend>Supprimer Fiche</legend>
                            <label for="artselect2">Séléctionner Fiche :</label>
                            <select name="artselect2" id="artselect2">
                                <option value="aucun">Aucun</option>
                                <?php
                                require_once('./inc/affichart.inc.php');
                                echo artselect();
                                ?>
                            </select>
                            <br>
                            <input type="submit" value="Suppression">
                            <input type="reset" value="Annuler">
                        </fieldset>
                    </form>
                </div>
                <div class="tabs-panel" id="adminpass">
                    <form action="inc/changepass.inc.php" method="post">
                        <fieldset class="fieldset">
                            <legend>Gestion du Mot de Passe</legend>
                            <label for="oldpass">Mot de Passe Actuel :</label><input type="password" name="oldpass" id="oldpass" value="" size="30" />
                            <label for="newpass">Nouveau Mot de Passe :</label><input type="password" name="newpass" id="newpass" value="" size="30" />
                            <br>
                            <input type="submit" value="Valider">
                            <input type="reset" value="Annuler">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>