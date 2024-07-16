        <?php include 'header.php'?>
        
        <main role="main">
            <!-- Hero -->
            <div class="content-space-t-lg-1 lib-hero overflow-hidden">
                <div class="container position-relative content-space-t-3 content-space-b-2">
                    <div class="w-lg-75 mx-lg-auto">
                        <div class="text-center mb-5">
                            <span class="text-cap"></span>
                            <h1 class="display-4">Roulez en toute tranquillité avec&nbsp;<span class="text-primary">Garazy</span></h1>
                        </div>
                        <div class="row justify-content-center align-items-sm-center col-sm-divider text-center text-sm-start gx-5 mb-5 mb-sm-7">
                            <!-- End Col -->
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <div class="w-lg-65 mx-lg-auto">
                        <!-- Input Card -->
                        <form action="" method="post" id="formulaire">
                            <div class="input-card input-card-sm">
                                <div class="input-card-form">
                                    <label for="nameRegisterForm" class="form-label visually-hidden">Enter your name</label>
                                    <input type="date" class="form-control form-control-lg" id="nameRegisterForm" placeholder="Your name" aria-label="Your name">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Date du jour</button>
                            </div>
                        </form>
                        <!-- End Input Card -->
                        <!-- SVG Shape -->
                        <figure class="position-absolute top-50 end-0 translate-middle-y d-none d-md-block" style="width: 17rem; margin-right: -10rem;">
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/three-arrows-1.svg"');?> alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                        <!-- SVG Shape -->
                        <figure class="position-absolute top-50 start-0 translate-middle-y d-none d-md-block" style="width: 14rem; margin-left: -10rem;">
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/three-arrows-2.svg"');?> alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                    </div>
                </div>
            </div>
            <!-- End Hero -->
            <!-- Features -->
            <div class="lib-content overflow-hidden">
</div>
            <!-- End Features -->
            <!-- Features -->
            <!-- End Features -->
            <!-- Features -->
            <!-- End Features -->
            <!-- Step Features -->
            <!-- End Step Features -->
            <!-- Testimonials -->
            <!-- End Testimonials -->
            <!-- Pricing -->
            <div class="lib-pricing overflow-hidden">
                <div class="container content-space-2 content-space-lg-3">
                    <div class="w-lg-65 text-center mx-lg-auto mb-5 mb-sm-7 mb-lg-10">
                        <h2>Voici les services disponible</h2>
                    </div>
                    <div class="position-relative">
                        <div class="d-flex mb-5 row">
                            <div class="pack-container"> 
                                <div class="header"> 
                                    <p class="title"> 
                                     Reparation Simple </p> 
                                    <div class="price-container"><span>Ar</span>15000
                                    </div>                                     
                                </div>
                                <h4 class="fs-3 title" style="margin-left: 26.862000000000002%;">Duree : <span>1h</span></h4> 
                                <div class="button-container"> 
                                    <button type="button">Modifier</button>                                     
                                </div>                                 
                            </div>
                            <div class="pack-container"> 
                                <div class="header"> 
                                    <p class="title">Reparation&nbsp; standard</p> 
                                    <div class="price-container">
                                        <span>Ar</span>25000
                                    </div>                                     
                                </div>
                                <h4 class="fs-3 title" style="margin-left: 26.862000000000002%;">Duree : <span>2h</span></h4> 
                                <div class="button-container"> 
                                    <button type="button">Modifier</button>                                     
                                </div>                                 
                            </div>
                            <div class="pack-container"> 
                                <div class="header"> 
                                    <p class="title"> 
      Reparation Complexe </p> 
                                    <div class="price-container"><span>Ar</span>80000
                                    </div>                                     
                                </div>
                                <h4 class="fs-3 title" style="margin-left: 26.862000000000002%;">Duree : <span>8h</span></h4> 
                                <div class="button-container"> 
                                    <button type="button">Modifier</button>                                     
                                </div>                                 
                            </div>
                            <!-- End Col -->
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                        <!-- SVG Shape -->
                        <figure class="position-absolute top-0 end-0 zi-n1 d-none d-md-block mt-10 me-n10" style="width: 4rem;">
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/pointer-up.svg"');?> alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                        <!-- SVG Shape -->
                        <figure class="position-absolute bottom-0 start-0 zi-n1 ms-n10 mb-n10" style="width: 15rem;">
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/curved-shape.svg"');?> alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                    </div>
                    <div class="text-center">
                        <p class="fs-6 text-muted mb-0">Prices in USD. Taxes may apply.</p>
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
                function modifDateRef() {
                    var date = document.getElementById("nameRegisterForm").value;

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
                    formData.append("date_ref", date);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert("Date de reference modifiée avec succes");
                                } else {
                                    alert("Erreur!");
                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('DateReference/update'); ?>", true);
                    xhr.send(formData);
                }
                var form = document.getElementById("formulaire");

                form.addEventListener("submit", function (event) {
                    event.preventDefault();
                    modifDateRef();
                });
            });
        </script>
