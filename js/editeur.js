function commande(nom, argument) {
    if (typeof argument === 'undefined') {
        argument = '';
    }
    switch (nom) {
        case "createLink":
            argument = prompt("Quelle est l'adresse du lien ?");
            break;
        case "insertImage":
            argument = prompt("Quelle est l'adresse de l'image ?");
            break;
        case "resizing":
            document.execCommand('enableObjectResizing', false, 'true');
            let stat = document.queryCommandState('enableObjectResizing');
            alert(stat);
            break;
    }
    document.execCommand(nom, false, argument);
}
