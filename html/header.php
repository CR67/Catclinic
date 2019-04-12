<div class="top-bar">
    <div class="top-bar-left">
        <img src="images/Bada.png" alt="logo" class="logo">
    </div>
    <div class="top-bar-title top-bar-right">
        <h2>CatClinic</h2>
    </div>
</div>

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="dropdown menu">
            <li>
                <button id="menu-accueil" onclick="changeContent('content', 'menu-accueil', 'index.php', 'EX=accueil', '$(\'#example-tabs\').foundation();');" class="menu-button is-active"><strong>Accueil</strong></button>
            </li>
            <li>
                <button id="menu-conseils" onclick="changeContent('content', 'menu-conseils', 'index.php', 'EX=conseils', '$(\'#example-tabs\').foundation();');" class="menu-button"><strong>Conseils</strong></button>
            </li>
            <li>
                <button id="menu-contacts" onclick="changeContent('content', 'menu-contacts', 'index.php', 'EX=contacts', '$(\'#example-tabs\').foundation();');" class="menu-button"><strong>Contacts</strong></button>
            </li>
            <li>
                <button id="menu-admin" onclick="changeContent('content', 'menu-admin', 'index.php', 'EX=administration', '$(\'#example-tabs\').foundation();');" class="menu-button"><strong>Administration</strong></button>
            </li>
        </ul>
    </div>
    <?php
        if(isset($_SESSION['login'])) {
            echo ('<div class="top-bar-right">Bienvenue '.$_SESSION['login'].' ! <form method="post" action="inc/deconnexion.inc.php"><button id="deconnexion" type="submit" class="menu-button"><strong>Déconnexion</strong></button></form></div>');
        }
    ?>
</div>
