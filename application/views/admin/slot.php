<?php include 'header.php' ?>
<main role="main">
    <!-- Hero -->
    <div class="content-space-t-lg-1 lib-hero overflow-hidden text-black-50">
        <div class="containers position-relative content-space-t-3 content-space-b-2">
            <div class="col-lg-4 grid-margin stretch-card w-100">
                <div class="card-body" style="width: 100%;">
                    <h1>Utilisation des Slots</h1>
                    <form id="dateForm">
                        <label for="dateInput">Sélectionnez une date :</label>
                        <input type="date" id="dateInput" required>
                        <button type="submit">Filtrer</button>
                    </form>
                    <div id="slots">
                        <div class="slot" id="slotA">
                            <h2>Slot A</h2>
                            <div class="table-responsive">
                                <table class="table table-hover" style="background-color:#f4f4f4;">
                                    <thead class="text-warning-emphasis">
                                        <tr class="text-primary-emphasis">
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Numero</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tab">
                                        <tr>
                                            <td>a</td>
                                            <td>a</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="slot" id="slotB">
                            <h2>Slot B</h2>
                            <div class="table-responsive">
                                <table class="table table-hover" style="background-color:#f4f4f4;">
                                    <thead class="text-warning-emphasis">
                                        <tr class="text-primary-emphasis">
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Numero</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tab">
                                        <tr>
                                            <td>a</td>
                                            <td>a</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="slot" id="slotC">
                            <h2>Slot C</h2>
                            <div class="table-responsive">
                                <table class="table table-hover" style="background-color:#f4f4f4;">
                                    <thead class="text-warning-emphasis">
                                        <tr class="text-primary-emphasis">
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Numero</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tab">
                                        <tr>
                                            <td>a</td>
                                            <td>a</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing -->
    <!-- FAQ -->
    <!-- End FAQ -->
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

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    label {
        margin-right: 10px;
        font-weight: bold;
    }

    input[type="date"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 10px;
    }

    button:hover {
        background-color: #0056b3;
    }

    #slots {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .slot {
        background: #e9ecef;
        padding: 20px;
        border-radius: 8px;
        width: 30%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .slot h2 {
        margin-bottom: 10px;
        color: #007bff;
    }

    .slot p {
        font-size: 1.2em;
        color: #333;
    }

    @media (max-width: 768px) {
        .slot {
            width: 100%;
            margin-bottom: 20px;
        }
    }
</style>
<script>
    document.getElementById('dateForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const selectedDate = document.getElementById('dateInput').value;

        // Vérifier si la date sélectionnée est supérieure à la date d'aujourd'hui
        const today = new Date();
        const selectedDateTime = new Date(selectedDate);

        if (selectedDateTime <= today) {
            alert("Veuillez sélectionner une date ultérieure à aujourd'hui.");
            return;
        }

        updateSlotUsage(selectedDate);
    });
</script>