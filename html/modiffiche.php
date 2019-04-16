<form action="inc/upload.inc.php" method="post" enctype="multipart/form-data">
    <fieldset class="fieldset">
        <legend>Modifier une Fiche</legend>
        <label for="userselect1">Séléctionner Fiche :</label>
        <select name="userselect1" id="userselect1" onchange="changeContent('editeur', 'null', 'index.php', 'EX=affichfiche'); alert(document.getElementById('userselect1').value);">
            <option value="aucun" onchange="">Aucun</option>
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
        <input type="button" value="Gauche" onclick="commande('justifyleft');">
        <input type="button" value="Droit" onclick="commande('justifyright');">
        <input type="button" value="Centré" onclick="commande('justifycenter');">
        <input type="button" value="Justifié" onclick="commande('justifyfull');">
        <input type="button" value="Liste" onclick="commande('insertunorderedlist');">
        <input type="button" value="Séparation" onclick="commande('inserthorizontalrule');">
        <input type="button" value="Paragraphe" onclick="commande('insertParagraph');">
        <input type="button" value="Annuler" onclick="commande('undo');">
        <select onchange="commande('heading', this.value); this.selectedIndex = 0;">
            <option value="">Titre</option>
            <option value="h1">Titre 1</option>
            <option value="h2">Titre 2</option>
            <option value="h3">Titre 3</option>
            <option value="h4">Titre 4</option>
            <option value="h5">Titre 5</option>
            <option value="h6">Titre 6</option>
        </select>
        <div id="editeur" contentEditable ></div>
        <input type="button" onclick="document.getElementById('resultat').value = document.getElementById('editeur').innerHTML;" value="Obtenir le HTML" ><br />
        <textarea id="resultat" name="resultat" row="20"></textarea>
        <input type="submit" value="Valider">
        <input type="reset" value="Annuler">
    </fieldset>
</form>
