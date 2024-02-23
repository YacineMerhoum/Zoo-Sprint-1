setTimeout(function() {
    document.querySelector(".apple").style.display = 'block';
}, 3500); 


// Fonction pour afficher le loader
function showLoader() {
    document.getElementById("loader").style.display = "block";
}

// Fonction pour cacher le loader après 2 secondes
function hideLoader() {
    setTimeout(function() {
        document.getElementById("loader").style.display = "none";
    }, 2000); 
}

// Événement lorsque la page est en cours de chargement
document.addEventListener("DOMContentLoaded", function() {
    showLoader(); // Afficher le loader lorsque la page commence à charger
});

// Événement lorsque la page a fini de charger
window.addEventListener("load", function() {
    hideLoader(); // Cacher le loader après 2 secondes
});



let monH1 = document.getElementById("monH1");
    
// Fonction pour afficher l'élément après un délai de 4 secondes
function afficherH1() {
    monH1.style.display = "block"; // Affiche l'élément h1
}

// Appeler la fonction d'affichage après 4 secondes (4000 millisecondes)
setTimeout(afficherH1, 4000);


///Faire disparaitre message SUCESS

let successText = document.querySelector(".text-anim");
function deleteText(){
    successText.style.display = "none";
}
setTimeout(deleteText, 5000)



// test  liberation animal animation CSS



// Rendre image caracters flou et titre sur le hover des bouttons 
let boutons = document.querySelectorAll(".buttonAnimal");

boutons.forEach(function(bouton) {
    bouton.addEventListener("mouseover", function() {
        let imageCible = bouton.closest(".cards").querySelector(".character");
        let title = bouton.closest(".cards").querySelector(".title");
        imageCible.classList.add("imageTigre");
        title.classList.add("imageTigre");
    });

    bouton.addEventListener("mouseout", function() {
        let imageCible = bouton.closest(".cards").querySelector(".character");
        let title = bouton.closest(".cards").querySelector(".title");
        imageCible.classList.remove("imageTigre");
        title.classList.remove("imageTigre");
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var enclosLinks = document.querySelectorAll('#enclosContainer a');

    enclosLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le lien de rediriger immédiatement
            
            document.getElementById('enclosContainer').classList.add('blur'); // Ajoute la classe de flou à la section spécifique
            document.querySelector("body").classList.add("zoomBg")
            setTimeout(function() {
                window.location = event.target.href; // Redirige vers la nouvelle page après un délai
            }, 1200); // Délai de 1 seconde avant la redirection
        });
    });
});






