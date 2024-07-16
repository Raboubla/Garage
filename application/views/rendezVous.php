<?php include 'header.php' ?>
<main role="main" >
    <!-- Hero -->
    <div class="content-space-t-lg-1 lib-hero overflow-hidden text-black-50">
        <div class="container position-relative content-space-t-3 content-space-b-2">
            <div class="col-lg-6 grid-margin stretch-card w-100" style=" margin-bottom: 8%;">
                <div class="col-md-5" style="margin-left: 35%;">
                    <form class="form" id="formulaire" method="post" action="">
                        <p class="text-black-50 titles" style="font-family: 'Oxanium', sans-serif; font-size: 29px;">Rendez-vous</p>
                        <label>Date et heure 
                                <input required="" placeholder="" type="datetime-local" class="input" id="date">
                            </label>
                        <label for="serviceType" class="form-label">Type de service</label>
                        <select id="serviceType" class="form-select" required>
                            <option selected disabled value="">Choisissez un service...</option>
                        </select>

                        <button type="submit" class="btn btn-outline-primary placeholder-wave rounded rounded-1">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Pricing -->
    <!-- FAQ -->
    <!-- End FAQ -->
  <?php include 'footer.php'?>
  <script type="text/javascript">
            window.addEventListener("load", function () {
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

                    var select = document.getElementById("serviceType");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success && response.services != null) {
                                    var services = response.services;
                                    select.innerHTML = '';
                                    for (var i = 0; i < services.length; i++) {
                                        var op = document.createElement('option');
                                        op.innerHTML = services[i].nom;
                                        op.value = services[i].id;
                                        select.appendChild(op);
                                    }
                                } else {
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('ServiceController/getAllServices'); ?>", true);
                    xhr.send(null);
                }
                function prendreRdv() {
                    var date = document.getElementById("date").value;
                    var service = document.getElementById("serviceType").value;

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

                    var user = <?php echo json_encode($this->session->userdata('actif_user')); ?>;

                    var formData = new FormData();
                    formData.append("voiture", user.id);
                    formData.append("service", service);
                    formData.append("date_rdv", date);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert(response.msg);
                                } else {
                                    alert(response.msg);
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('RendezVousController/createRdvDetaille'); ?>", true);
                    xhr.send(formData);
                }
                var form = document.getElementById("formulaire");

                getAllServices();

                form.addEventListener("submit", function (event) {
                    event.preventDefault();
                    prendreRdv();
                });
            });
        </script>
