function MaxCar(texte) {
    if(texte.value.length > 250) {
        texte.value = texte.value.substring(0, 250);
        alert('Le text de votre mail ne doit pas dépasser 250 caratères !');
        return;
    }
}