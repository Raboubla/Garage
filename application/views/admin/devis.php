<?php include 'header.php'?>
<main role="main">
            <!-- Hero -->
            <div class="content-space-t-lg-1 lib-hero overflow-hidden text-black-50">
                <div class="container position-relative content-space-t-3 content-space-b-2">
                    <div class="col-lg-6 grid-margin stretch-card w-100">
                        <div class="card-body">
                            <h4 class="card-title text-black-50" style="font-family: 'Oxanium', sans-serif; font-size: 42px;">Liste des devis</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning-emphasis">
                                        <tr class="text-primary-emphasis">
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Numero Voiture</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Type de voiture</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Date de prestation</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Montant</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Date de paiement&nbsp;</th>
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
                function getAllDevis() {

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

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success && response.rdv != null) {
                                    var rdv = response.rdv;
                                    var tab = document.getElementById("tab");
                                    for (var i = 0; i < rdv.length; i++) {
                                        var tr = document.createElement('tr');

                                        var td1 = document.createElement('td');
                                        td1.textContent = rdv[i].numero;

                                        var td2 = document.createElement('td');
                                        td2.textContent = rdv[i].type;

                                        var td3 = document.createElement('td');
                                        td3.textContent = rdv[i].date_rdv;

                                        var td6 = document.createElement('td');
                                        td6.textContent = rdv[i].montannt;

                                        var td4 = document.createElement('td');
                                        var form = document.createElement('form');
                                        form.setAttribute('role', 'form');
                                        form.setAttribute('action', '');
                                        form.setAttribute('method', 'post');
                                        form.setAttribute('id', 'serviceForm_' + rdv[i].id);
                                        var div = document.createElement('div');
                                        div.classList.add('mb-auto');
                                        var input = document.createElement('input');
                                        input.setAttribute('type', 'date');
                                        input.classList.add('form-control');
                                        input.setAttribute('placeholder', 'Enter email');
                                        input.setAttribute('aria-describedby', 'emailHelp');
                                        input.setAttribute('id', 'input_' + rdv[i].id);
                                        div.appendChild(input);
                                        form.appendChild(div);
                                        td4.appendChild(form);

                                        var td5 = document.createElement('td');
                                        var button = document.createElement('button');
                                        button.classList.add('btn', 'btn-light', 'btn-outline-dark', 'placeholder-wave', 'rounded', 'rounded-1');
                                        button.setAttribute('type', 'submit');
                                        button.textContent = 'Valider';
                                        td5.appendChild(button);

                                        // Ajouter les TD à la TR
                                        tr.appendChild(td1);
                                        tr.appendChild(td2);
                                        tr.appendChild(td3);
                                        tr.appendChild(td6);
                                        tr.appendChild(td4);
                                        tr.appendChild(td5);

                                        // Ajouter la TR à la table
                                        tab.appendChild(tr);

                                        (function(id) {
                                            button.onclick = function() {
                                                modifDatePaiement(id);
                                            };
                                        })(rdv[i].id);
                                    }

                                } else {
                                    //alert("Erreur!");
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('DevisController/getAllRendezVous'); ?>", true);
                    xhr.send(null);
                }
                function modifDatePaiement(id) {
                    var date = document.getElementById("input_" + id).value;

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
                    formData.append("date_paiement", date);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert("Date de paiement modifiée avec succes");
                                } else {
                                    alert("Erreur!");
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('DevisController/updatePaiement'); ?>", true);
                    xhr.send(formData);
                }

                getAllDevis();
            });
        </script>
