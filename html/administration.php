<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
            <ul class="vertical tabs" data-responsive-accordion-tabs="tabs accordion large-accordion medium-tabs" id="example-tabs">
                <li class="tabs-title first is-active">
                    <a href="#admincontenu" aria-selected="true">Modification et Ajout de Contenu</a>
                </li>
                <li class="tabs-title last">
                    <a href="#adminsupp">Suppression de Contenu</a>
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
                            <label for="userselect2">Séléctionner Fiche :</label>
                            <select name="userselect2" id="userselect2">
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
            </div>
        </div>
    </div>
</div>