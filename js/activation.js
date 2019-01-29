var nom=false;

function setActive(nomClass)
{
    var i;

    if(!nom) {
        var tab1 = document.getElementsByClassName('first');
        for (i = 0; i < tab1.length; i++) {
            tab1[i].classList.remove('is-active');
        }
        tab1[0].firstElementChild.removeAttribute('aria-selected');
    }else {
            var tab2=document.getElementsByClassName(nom);
            for (i=0; i<tab2.length; i++) {
                tab2[i].classList.remove('is-active');
            }
        tab2[0].firstElementChild.removeAttribute('aria-selected');
        }
    var tab3=document.getElementsByClassName(nomClass);
    for (i=0; i<tab3.length; i++) {
        tab3[i].classList.add('is-active');
    }
    tab3[0].firstElementChild.setAttribute('aria-selected', 'true');
    nom=nomClass;

    return;
}

function setNom()
{
    nom=false;
    return;
}