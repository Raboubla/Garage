<?php include 'header.php' ?>
<main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="containers" >
        <h1>Tableau de Bord</h1>

        <div class="summary">
            <h2>Montant Total du Chiffre d'Affaire</h2>
            <p id="totalRevenue">0 €</p>
        </div>

        <div class="chart-container">
            <canvas id="revenueChart"></canvas>
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
    margin-top: 10%;
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
    text-align: center;
}

.chart-container {
    width: 100%;
    text-align: center;
}

</style>

<script>
    // script.js

document.addEventListener('DOMContentLoaded', function() {
    // Simuler des données de chiffre d'affaire
    const totalRevenue = 35000; // Exemple de chiffre d'affaire total

    // Afficher le montant total du chiffre d'affaire
    document.getElementById('totalRevenue').textContent = totalRevenue.toLocaleString('fr-FR', { style: 'currency', currency: 'EUR' });

    // Configuration du graphique
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const referenceDate = '2024-07-15'; // Date de référence

    const data = {
        labels: ['Payé', 'Non Payé'],
        datasets: [{
            label: 'Montants',
            data: [28000, 7000], // Exemple de données pour payé et non payé
            backgroundColor: [
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    };

    const options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function(value) { return value.toLocaleString('fr-FR', { style: 'currency', currency: 'EUR' }); }
                }
            }]
        }
    };

    // Créer le graphique
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
});

</script>