// Selecteurs

//Sélectionne les liens delete

const deleteLinks = document.getElementsByClassName('btn_delete');
const btnNo = document.getElementById('modal_btn_no');
const btnYes = document.getElementById('modal_btn_yes');

//Boucle qui va affecter l'élement clic à tous les liens ayant la class ="btn_delete"
//Ou en résumé à tous les éléments qui sont dans notre sélection (collectionHTML) deleteLinks
for (let deleteLink of deleteLinks){
    //Affecte l'évenement click 
    //Sur clic executera une fonction sans nom dite anonyme
    deleteLink.addEventListener('click', function(e){
        e.preventDefault();
    
    //Selectionne l'élement ayant l'id modal
    const modal = document.getElementById('modal');
    modal.classList.remove('hidden');

    // Ajout de la classe ready-to-delete au lien que l'on vient de cliquer
        this.classList.toggle('ready-to-delete');
    });
}

//Ajout de l'évènement click au bouton non
btnNo.addEventListener('click', function(){
    const modal = document.getElementById('modal');
    modal.classList.add('hidden');

    //Sélection du lien ayant la classe ready-to-delete
    const elementsToDelete = document.getElementsByClassName('ready-to-delete');
    for ( let elementToDelete of elementsToDelete){
        elementToDelete.classList.toggle('ready-to-delete');
    }

});

//Ajout de l'évènement click au bouton oui
btnYes.addEventListener('click', function(){

    const modal = document.getElementById('modal');
    modal.classList.add('hidden');    
;
    const elementsToDelete = document.getElementsByClassName('ready-to-delete');
    for ( let elementToDelete of elementsToDelete){
        location.href=elementToDelete.getAttribute('href');
    }
});