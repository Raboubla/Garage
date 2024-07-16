<?php include 'header.php' ?>

<?php
// Exemple de récupération des rendez-vous depuis la base de données
$rendezvous = [
    [
        'title' => 'Rendez-vous 1',
        'start' => '2024-07-20T10:00:00',
        'end' => '2024-07-20T12:00:00'
    ],
    [
        'title' => 'Rendez-vous 2',
        'start' => '2024-07-21T13:00:00',
        'end' => '2024-07-21T15:00:00'
    ]
];

// Convertir les rendez-vous en JSON
$jsonRendezvous = json_encode($rendezvous);
?>
<div style="height : 100px"></div>
<main style="margin-left: 25%; width:50%">
<style>
    /* Styles pour le formulaire */
    #appointmentForm {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      z-index: 1000;
    }
  </style>
  <div id="calendar" style="width: 930px; height: 772.733px;"></div>

  <!-- Formulaire d'ajout de rendez-vous -->
  <div id="appointmentForm">
    <h2>Ajouter un rendez-vous</h2>
    <form id="addAppointmentForm" action="<?php echo site_url('welcome/ajouter_rendezvousCalendrier'); ?>" method="post">
      <label for="appointmentDate">Date du rendez-vous:</label><br>
      <input type="text" id="appointmentDate" name="date" readonly><br><br>

      <label for="appointmentTime">Heure du rendez-vous:</label><br>
      <input type="time" id="appointmentTime" name="time"><br><br>

      <label for="typeService">Type de service:</label><br>
      <select id="typeService" name="typeService">
        <!-- <?php foreach ($typeServices as $type) : ?>
        <option value="<?php echo $type->idService; ?>"><?php echo $type->nomService; ?></option>
      <?php endforeach; ?> -->
        <option value="">Test1</option>
        <option value="">Test2</option>
      </select><br><br>

      <label for="numVoiture">Numéro de voiture déjà enregistré:</label><br>
      <select id="numVoiture" name="numFiara">
        <!-- <?php foreach ($existing_cars as $car) : ?>
        <option value="<?php echo $car->numVoiture; ?>"><?php echo $car->numVoiture; ?></option>
      <?php endforeach; ?> -->
        <option value="">Test1</option>
        <option value="">Test2</option>
      </select><br><br>

      <button type="submit">Ajouter</button>
      <button type="button" onclick="closeForm()">Annuler</button>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      
      // Récupérer les rendez-vous depuis la variable PHP
      var events = <?php echo $jsonRendezvous; ?>;
      
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick: function(info) {
          openForm(info.dateStr);
        },
        events: events // Ajouter les événements ici
      });
      calendar.render();
    });

    function openForm(date) {
      document.getElementById('appointmentDate').value = date;
      document.getElementById('appointmentForm').style.display = 'block';
    }

    function closeForm() {
      document.getElementById('appointmentForm').style.display = 'none';
    }
  </script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</main>
