<?php include 'header.php'?>
        <main role="main">
            <!-- Hero -->
            <div class="content-space-t-lg-1 lib-hero overflow-hidden text-black-50">
                <div class="container position-relative content-space-t-3 content-space-b-2">
                    <div class="col-lg-6 grid-margin stretch-card w-100" style=" margin-bottom: 8%;">
                        <div class="col-md-5" style="margin-left: 35%;">
                            <form class="form"  id="formulaire" action="" method="post">
                                <p class="text-black-50 title" style="font-family: 'Oxanium', sans-serif; font-size: 29px;">Créer</p> 
                                <label>
                                    <input required="" placeholder="" type="text" class="input" id="nom"><span>Nom du service</span>
                                </label>
                                <div class="flex">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input" id="duree"><span>Durée</span>
                                    </label>
                                    <label>
                                        <input required="" placeholder="" type="text" class="input" id="montant"><span>Montant</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-outline-primary placeholder-wave rounded rounded-1">Valider</button>                                 
                            </form>                             
                        </div>
                    </div>
                    <div class="modal" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editServiceModalLabel">Modifier le Service</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm">
                                        <input type="hidden" id="idu">
                                        <div class="form-group">
                                            <label for="editNom">Nom du service</label>
                                            <input type="text" class="form-control" id="nomu" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editDuree">Durée</label>
                                            <input type="text" class="form-control" id="dureeu" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editMontant">Montant</label>
                                            <input type="text" class="form-control" id="montantu" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card w-100">
                        <div class="card-body">
                            <h4 class="card-title text-black-50" style="font-family: 'Oxanium', sans-serif; font-size: 42px;">Liste des services</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning-emphasis">
                                        <tr class="text-primary-emphasis">
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Nom</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Temps de realisation</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tab">
                                    <tr>
                                        
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
</div>
                    </div>
                </div>
            </div>
            <!-- End Pricing -->
            <!-- FAQ -->
            <!-- End FAQ -->
        </main>
        <?php include 'footer.php'?>
        <script type="text/javascript">
            window.addEventListener("load", function () {
                function insertServices() {
                    var nom = document.getElementById("nom").value;
                    var duree = document.getElementById("duree").value;
                    var montant = document.getElementById("montant").value;

                    var xhr;
                    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
                    catch (e)
                    {
                        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
                        catch (e2)
                        {
                        try {  xhr = new XMLHttpRequest();  }
                        catch (e3) {  xhr = false;   }
                        }
                    }

                    var formData = new FormData();
                    formData.append("nom", nom);
                    formData.append("duree", duree);
                    formData.append("montant", montant);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert("Service inseré avec succes");
                                    getAllServices();
                                } else {
                                    alert("Erreur!");
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('ServiceController/createService'); ?>", true);
                    xhr.send(formData);
                }
                function getAllServices() {

                    var xhr;
                    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
                    catch (e)
                    {
                        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
                        catch (e2)
                        {
                        try {  xhr = new XMLHttpRequest();  }
                        catch (e3) {  xhr = false;   }
                        }
                    }

                    var tab = document.getElementById("tab");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success && response.services != null) {
                                    var services = response.services;
                                    tab.innerHTML = '';
                                    for (var i = 0; i < services.length; i++) {
                                        var tr = document.createElement('tr');
                                        tr.setAttribute('data-id', services[i].id);
                                        var id = services[i].id;
                                        var service = services[i];

                                        var td1 = document.createElement('td');
                                        td1.textContent = services[i].nom;

                                        var [hours, minutes, seconds] = services[i].duree.split(':');
                                        var td2 = document.createElement('td');
                                        if (hours > 1) {
                                            if (minutes > 0) {
                                                td2.innerHTML = hours + ' <span>heures</span> ' + minutes + ' <span>minutes</span>';   
                                            } else {
                                                td2.innerHTML = hours + ' <span>heures</span> ';
                                            }
                                        } else {
                                            if (minutes > 0) {
                                                td2.innerHTML = hours + ' <span>heure</span> ' + minutes + ' <span>minutes</span>';   
                                            } else {
                                                td2.innerHTML = hours + ' <span>heure</span> ';
                                            }
                                        }

                                        var td3 = document.createElement('td');
                                        td3.classList.add('text-danger');
                                        td3.innerHTML = '<span>Ar</span> ' + services[i].montant;

                                        var td4 = document.createElement('td');
                                        td4.style.width = '25%';

                                        var modifyButton = document.createElement('a');
                                        modifyButton.classList.add('btn', 'btn-light', 'btn-outline-primary', 'placeholder-wave', 'rounded', 'rounded-1');
                                        modifyButton.href = '#';
                                        modifyButton.textContent = 'Modifier';
                                        modifyButton.onclick = function() { showEditModal(service); };
                                        (function(id) {
                                            modifyButton.onclick = function() {
                                                showEditModal(id);
                                            };
                                        })(services[i]);

                                        var deleteButton = document.createElement('a');
                                        deleteButton.classList.add('btn', 'btn-danger', 'btn-outline-light', 'placeholder-wave', 'rounded', 'rounded-1', 'text-white');
                                        deleteButton.href = '#';
                                        deleteButton.textContent = 'Supprimer';
                                        deleteButton.onclick = function() { deleteService(id); };
                                        (function(id) {
                                            deleteButton.onclick = function() {
                                                deleteService(id);
                                            };
                                        })(services[i].id);

                                        // Ajout des boutons au dernier td
                                        td4.appendChild(modifyButton);
                                        td4.appendChild(deleteButton);

                                        // Ajout des td au tr
                                        tr.appendChild(td1);
                                        tr.appendChild(td2);
                                        tr.appendChild(td3);
                                        tr.appendChild(td4);
                                        tab.appendChild(tr);
                                    }
                                } else {
                                    alert("Erreur de getAll!");
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('ServiceController/getAllServices'); ?>", true);
                    xhr.send(null);
                }
                function showEditModal(service) {
                    document.getElementById("idu").value = service.id;
                    document.getElementById("nomu").value = service.nom;
                    document.getElementById("dureeu").value = service.duree;
                    document.getElementById("montantu").value = service.montant;
                    document.getElementById("editServiceModal").style.display = "block";
                }
                function closeModal() {
                    document.getElementById("editServiceModal").style.display = "none";
                }
                function updateService() {
                    var id = document.getElementById("idu").value;
                    var nom = document.getElementById("nomu").value;
                    var duree = document.getElementById("dureeu").value;
                    var montant = document.getElementById("montantu").value;

                    var xhr;
                    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
                    catch (e)
                    {
                        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
                        catch (e2)
                        {
                        try {  xhr = new XMLHttpRequest();  }
                        catch (e3) {  xhr = false;   }
                        }
                    }
                    var formData = new FormData();
                    formData.append("id", id);
                    formData.append("nom", nom);
                    formData.append("duree", duree);
                    formData.append("montant", montant);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                alert("Service mis à jour avec succès");
                                closeModal();
                                getAllServices(); // Actualiser la liste des services après mise à jour
                            } else {
                                alert("Erreur!");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('ServiceController/updateService'); ?>", true); // Assurez-vous que l'URL est correcte
                    xhr.send(formData);
                }
                function deleteService(id) {

                    var xhr;
                    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
                    catch (e)
                    {
                        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
                        catch (e2)
                        {
                        try {  xhr = new XMLHttpRequest();  }
                        catch (e3) {  xhr = false;   }
                        }
                    }

                    var formData = new FormData();
                    formData.append("id", id);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert("Service supprimé avec succes");
                                    getAllServices();
                                } else {
                                    alert("Erreur!");
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('ServiceController/deleteService'); ?>", true);
                    xhr.send(formData);
                }
                var form = document.getElementById("formulaire");
                var editForm = document.getElementById("editForm");

                getAllServices();

                form.addEventListener("submit", function (event) {
                    event.preventDefault();
                    insertServices();
                    getAllServices();
                });

                editForm.addEventListener("submit", function (event) {
                    event.preventDefault();
                    updateService();
                });
            });
        </script>