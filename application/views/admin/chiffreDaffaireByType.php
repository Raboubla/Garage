<?php include 'header.php' ?>
<main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="containers">
        <h1>Tableau de Bord</h1>

        <!-- Résumé du chiffre d'affaire par type de voiture -->
        <div class="summary">
            <h2>Montant Total du Chiffre d'Affaire par Type de Voiture</h2>
            <ul id="carTypeList">
                <!-- Les éléments seront ajoutés dynamiquement -->
            </ul>
        </div>

        <!-- Détails des ventes par type de voiture -->
        <div class="details" id="carTypeDetails">
            <!-- Contenu dynamique généré par JavaScript -->
        </div>
    </div>
</main>

<?php include 'footer.php' ?>

<style>
    /* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.containers {
    max-width: 800px;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1, h2 {
    text-align: center;
    color: #333;
}

.summary {
    margin-bottom: 20px;
}

#carTypeList {
    list-style-type: none;
    padding: 0;
}

#carTypeList li {
    cursor: pointer;
    margin-bottom: 5px;
    padding: 10px;
    background-color: #f0f0f0;
    border-radius: 4px;
}

#carTypeList li:hover {
    background-color: #e0e0e0;
}

.details {
    display: none;
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

</style>

<script>
   // script.js

document.addEventListener('DOMContentLoaded', function() {
    // Simuler des données de chiffre d'affaire par type de voiture
    const carTypeData = [
        { type: 'SUV', amount: 25000, details: [{ name: 'Vente 1', amount: 10000 }, { name: 'Vente 2', amount: 15000 }] },
        { type: 'Berline', amount: 18000, details: [{ name: 'Vente 1', amount: 8000 }, { name: 'Vente 2', amount: 10000 }] },
        { type: 'Compacte', amount: 12000, details: [{ name: 'Vente 1', amount: 5000 }, { name: 'Vente 2', amount: 7000 }] }
        // Ajoutez d'autres types de voitures avec leurs montants et détails ici
    ];

    // Afficher le montant total du chiffre d'affaire par type de voiture
    const carTypeList = document.getElementById('carTypeList');
    carTypeData.forEach(car => {
        const li = document.createElement('li');
        li.textContent = `${car.type}: ${car.amount.toLocaleString('fr-FR', { style: 'currency', currency: 'EUR' })}`;
        li.setAttribute('data-type', car.type);
        li.classList.add('carTypeItem');
        li.addEventListener('click', () => showCarTypeDetails(car));
        carTypeList.appendChild(li);
    });

    // Fonction pour afficher les détails d'un type de voiture lors du clic
    function showCarTypeDetails(car) {
        const detailsContainer = document.getElementById('carTypeDetails');
        detailsContainer.innerHTML = `
            <h3>Détails pour ${car.type}</h3>
            <ul>
                ${car.details.map(detail => `<li>${detail.name}: ${detail.amount.toLocaleString('fr-FR', { style: 'currency', currency: 'EUR' })}</li>`).join('')}
            </ul>
        `;
        detailsContainer.style.display = 'block';
    }
});

</script>