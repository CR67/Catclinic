<form action="inc/upload.inc.php" method="post" enctype="multipart/form-data">
    <fieldset class="fieldset">
        <legend>Modifier une Fiche</legend>
        <label for="userselect1">Séléctionner Fiche :</label>
        <select name="userselect1" id="userselect1">
            <option value="aucun">Aucun</option>
            <?php
            require_once('./inc/affichart.inc.php');
            echo artselect();
            ?>
        </select>
        <br>
        <input type="button" value="G" style="font-weight:bold;" onclick="commande('bold')">
        <input type="button" value="I" style="font-style:italic;" onclick="commande('italic')">
        <input type="button" value="S" style="text-decoration:underline;" onclick="commande('underline')">
        <input type="button" value="Lien" onclick="commande('createLink');">
        <select onchange="commande('heading', this.value); this.selectedIndex = 0;">
            <option value="">Titre</option>
            <option value="h1">Titre 1</option>
            <option value="h2">Titre 2</option>
            <option value="h3">Titre 3</option>
            <option value="h4">Titre 4</option>
            <option value="h5">Titre 5</option>
            <option value="h6">Titre 6</option>
        </select>
        <div id="editeur" contentEditable >

        </div>
    </fieldset>
</form>
