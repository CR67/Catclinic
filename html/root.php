<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell medium-3">
            <ul class="vertical tabs" data-responsive-accordion-tabs="tabs accordion large-accordion medium-tabs" id="example-tabs">
                <li class="tabs-title first is-active">
                    <a href="#aduser" aria-selected="true">Ajout utilisateur</a>
                </li>
                <li class="tabs-title">
                    <a href="#suppuser">Suppression Utilisateur</a>
                </li>
                <li class="tabs-title last">
                    <a href="#resetpass">Réinitialiser Mot de Passe</a>
                </li>
            </ul>
        </div>
        <div class="cell medium-9">
            <div class="tabs-content" data-tabs-content="example-tabs">
                <div class="tabs-panel is-active" id="aduser">
                    <form action="inc/adduser.inc.php" method="post">
                        <fieldset class="fieldset">
                            <legend>Ajouter Utilisateur</legend>
                            <label for="login">Identifiant :</label>
                            <input type="text" name="login" id="login" size="20" />
                            <label for="psw">Mot de Passe :</label>
                            <input type="password" name="psw" id="psw" size="20" />
                            <br>
                            <input type="submit" value="Création">
                            <input type="reset" value="Annuler">
                        </fieldset>
                    </form>
                </div>
                <div class="tabs-panel" id="suppuser">
                    <form action="inc/suppuser.inc.php" method="post">
                        <fieldset class="fieldset">
                            <legend>Supprimer Utilisateur</legend>
                            <label for="userselect1">Séléctionner Utilisateur :</label>
                            <select name="userselect1" id="userselect1">
                                <option value="aucun">Aucun</option>
                                <?php
                                require_once('./inc/affichuser.inc.php');
                                echo affichselect();
                                ?>
                            </select>
                            <br>
                            <input type="submit" value="Suppression">
                            <input type="reset" value="Annuler">
                        </fieldset>
                    </form>
                </div>
                <div class="tabs-panel" id="resetpass">
                    <form action="inc/resetuser.inc.php" method="post">
                        <fieldset class="fieldset">
                            <legend>Réinitialiser Mot de Passe</legend>
                            <label for="userselect2">Séléctionner Utilisateur :</label>
                            <select name="userselect2" id="userselect2">
                                <option value="aucun">Aucun</option>
                                <?php
                                require_once('./inc/affichuser.inc.php');
                                echo affichselect();
                                ?>
                            </select>
                            <br>
                            <input type="submit" value="Réinitialiser">
                            <input type="reset" value="Annuler">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
