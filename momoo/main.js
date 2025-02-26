// Données des véhicules
const vehicles = [{
        name: "Dacia Logan",
        price: "300 DH/jour",
        image: ".vscode/thumb2-dacia-logan-4k-street-2022-cars-romanian-cars.jpg",
        description: "Berline économique et fiable"
    },
    {
        name: "Renault Clio",
        price: "350 DH/jour",
        image: ".vscode/carpixel.net-2023-renault-clio-e-tech-esprit-alpine-uk-120634-wide.jpg",
        description: "Citadine moderne et confortable"
    },
    {
        name: "Hyundai Tucson",
        price: "600 DH/jour",
        image: ".vscode/tucsonnouvellegenerationdynamiquescclementchoulot4.jpg",
        description: "SUV familial tout confort"
    },
    {
        name: "Mercedes Classe C",
        price: "1000 DH/jour",
        image: ".vscode/mercedes-benz-c-class-c205-black-mercedes-benz-coupe-wallpaper-preview.jpg",
        description: "Berline luxueuse"
    },
    {
        name: "BMW Série 5",
        price: "1200 DH/jour",
        image: "https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=800&q=80",
        description: "Performance et élégance"
    },
    {
        name: "Volkswagen Golf",
        price: "600 DH/jour",
        image: ".vscode/HD-wallpaper-2020-volkswagen-golf-8-front-car.jpg",
        description: "Compacte polyvalente"
    },
    {
        name: "Range Rover Sport",
        price: "1500 DH/jour",
        image: ".vscode/sport-land-rover-range-rover-sport-wallpaper-preview.jpg",
        description: "SUV de luxe"
    },
    {
        name: "Toyota Corolla",
        price: "450 DH/jour",
        image: ".vscode/toyota-toyota-corolla-car-compact-car-hybrid-car-hd-wallpaper-preview.jpg",
        description: "Fiabilité japonaise"
    },
    {
        name: "Audi A6",
        price: "1100 DH/jour",
        image: ".vscode/2019-audi-a6.jpg",
        description: "Technologie allemande"
    },
    {
        name: "Peugeot 3008",
        price: "700 DH/jour",
        image: ".vscode/peugeot-3008.webp",
        description: "SUV français élégant"
    },
    {
        name: "Fiat 500",
        price: "300 DH/jour",
        image: ".vscode/eyJidWNrZXQiOiJlYXNpZXJhZC1pbWFnZXNlcnZlci1jYWNoZSIsImVkaXRzIjp7InRvRm9ybWF0IjoianBlZyIsInJlc2l6ZSI6eyJmaXQiOiJpbnNpZGUiLCJ3aWR0aCI6MTIwMCwiaGVpZ2h0Ijo5MDB9fSwia2V5IjoiNTA5MzIwLzI1OTY3MTM2LzI0N.jpg",
        description: "Citadine compacte et stylée"
    },
    {
        name: "Porsche Cayenne",
        price: "2000 DH/jour",
        image: ".vscode/1-4.webp",
        description: "SUV sportif de luxe"
    }
];

// Vérifie si on est sur la page contenant la grille des véhicules
if (document.getElementById('vehicleGrid')) {
    displayVehicles(); // Appelle la fonction pour afficher les véhicules
}

// Fonction pour afficher les véhicules dans une grille
function displayVehicles() {
    const vehicleGrid = document.getElementById('vehicleGrid'); // Récupère l'élément contenant la grille

    // Parcourt chaque véhicule et génère une carte HTML
    vehicles.forEach(vehicle => {
        const vehicleCard = document.createElement('div'); // Crée un conteneur pour une carte de véhicule
        vehicleCard.className = 'vehicle-card'; // Attribue une classe pour le style CSS

        // Ajoute le contenu HTML de la carte
        vehicleCard.innerHTML = `
            <img src="${vehicle.image}" alt="${vehicle.name}"> 
            <div class="vehicle-info">
                <h3>${vehicle.name}</h3> 
                <p>${vehicle.description}</p> 
                <p class="price">${vehicle.price}</p> 
                <a href="contact.html" class="cta-button">Réserver</a>
            </div>
        `;

        vehicleGrid.appendChild(vehicleCard); // Ajoute la carte à la grille
    });
}

// Gestion du formulaire de réservation (si présent)
const vehicleSelect = document.getElementById('vehicleSelect'); // Liste déroulante des véhicules
const selectedVehicleDiv = document.getElementById('selectedVehicle'); // Affichage des détails du véhicule sélectionné

if (vehicleSelect) {
    // Remplit la liste déroulante avec les noms des véhicules
    vehicles.forEach(vehicle => {
        const option = document.createElement('option'); // Crée une option pour chaque véhicule
        option.value = vehicle.name; // Définit la valeur de l'option
        option.textContent = vehicle.name; // Définit le texte affiché
        vehicleSelect.appendChild(option); // Ajoute l'option à la liste déroulante
    });

    // Gère le changement de sélection dans la liste déroulante
    vehicleSelect.addEventListener('change', function() {
        const selectedVehicle = vehicles.find(v => v.name === this.value); // Trouve le véhicule correspondant

        if (selectedVehicle) {
            // Affiche les détails du véhicule sélectionné
            selectedVehicleDiv.innerHTML = `
                <img src="${selectedVehicle.image}" alt="${selectedVehicle.name}">
                <h4>${selectedVehicle.name}</h4>
                <p>${selectedVehicle.description}</p>
                <p class="price">${selectedVehicle.price}</p>
            `;
            selectedVehicleDiv.classList.add('active'); // Ajoute une classe active pour le style
        } else {
            // Réinitialise l'affichage si aucune sélection
            selectedVehicleDiv.innerHTML = '';
            selectedVehicleDiv.classList.remove('active');
        }
    });
}

// Gestion des dates de réservation
const startDateInput = document.querySelector('input[name="startDate"]'); // Champ de date de début
const endDateInput = document.querySelector('input[name="endDate"]'); // Champ de date de fin

if (startDateInput && endDateInput) {
    // Définit la date minimale à aujourd'hui
    const today = new Date().toISOString().split('T')[0]; // Obtenez la date actuelle au format AAAA-MM-JJ
    startDateInput.min = today; // Applique la restriction minimale

    // Met à jour la date minimale pour le champ de fin lorsque le début change
    startDateInput.addEventListener('change', function() {
        endDateInput.min = this.value; // La date de fin ne peut pas être avant la date de début
        if (endDateInput.value && endDateInput.value < this.value) {
            endDateInput.value = this.value; // Ajuste automatiquement la date de fin si elle est invalide
        }
    });
}

// Gestion du formulaire de contact
const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Empêche l'envoi du formulaire par défaut

        // Vérifie si c'est une réservation (basée sur la présence de la liste déroulante)
        const isReservation = !!document.getElementById('vehicleSelect');

        if (isReservation) {
            alert('Merci pour votre réservation ! Nous vous contacterons rapidement pour la confirmer.');
        } else {
            alert('Merci pour votre message ! Nous vous contacterons bientôt.');
        }

        this.reset(); // Réinitialise le formulaire
        if (selectedVehicleDiv) {
            selectedVehicleDiv.innerHTML = ''; // Réinitialise les détails du véhicule sélectionné
            selectedVehicleDiv.classList.remove('active'); // Supprime la classe active
        }
    });
}

// Gestion du bouton "Réserver maintenant" sur la page d'accueil
const mainCTA = document.querySelector('.hero .cta-button');
if (mainCTA) {
    mainCTA.addEventListener('click', function() {
        window.location.href = 'vehicules.html'; // Redirige vers la page des véhicules
    });
}