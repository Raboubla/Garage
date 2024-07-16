        <?php include 'header.php' ?>

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
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/three-arrows-1.svg"'); ?> alt=" Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                        <!-- SVG Shape -->
                        <figure class="position-absolute top-50 start-0 translate-middle-y d-none d-md-block" style="width: 14rem; margin-left: -10rem;">
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/three-arrows-2.svg"'); ?> alt=" Image Description">
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
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/pointer-up.svg"'); ?> alt=" Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                        <!-- SVG Shape -->
                        <figure class="position-absolute bottom-0 start-0 zi-n1 ms-n10 mb-n10" style="width: 15rem;">
                            <img class="img-fluid" src="<?php echo base_url('assets/svg/components/curved-shape.svg"'); ?> alt=" Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                    </div>
                    <div class="text-center">
                        <p class="fs-6 text-muted mb-0">Prices in USD. Taxes may apply.</p>
                    </div>
                </div>
            </div>
            <div  style="margin-top: 5%; margin-bottom: 5%; height:350px; margin-left:50% ">
                <div class="container ">
                <form action="<?php echo site_url('cleanup_controller/execute_truncate'); ?>" method="post">
        
                
                    <button class="button" type="submit">
                        <div class="lid">
                            <span class="side top"></span>
                            <span class="side front"></span>
                            <span class="side back"> </span>
                            <span class="side left"></span>
                            <span class="side right"></span>
                        </div>
                        <div class="panels">
                            <div class="panel-1">
                                <div class="panel-2">
                                    <div class="btn-trigger">
                                        <span class="btn-trigger-1"></span>
                                        <span class="btn-trigger-2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </form>
                </div>
            </div>
            <!-- End Pricing -->
            <!-- FAQ -->
            <!-- End FAQ -->
        </main>
        <?php include 'footer.php' ?>
        <script type="text/javascript">
            window.addEventListener("load", function() {
                function modifDateRef() {
                    var date = document.getElementById("nameRegisterForm").value;

                    var xhr;
                    try {
                        xhr = new ActiveXObject('Msxml2.XMLHTTP');
                    } catch (e) {
                        try {
                            xhr = new ActiveXObject('Microsoft.XMLHTTP');
                        } catch (e2) {
                            try {
                                xhr = new XMLHttpRequest();
                            } catch (e3) {
                                xhr = false;
                            }
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

                form.addEventListener("submit", function(event) {
                    event.preventDefault();
                    modifDateRef();
                });
            });
        </script>

        <style>
            .button {
                cursor: pointer;
                position: relative;
                display: inline-block;
                transform-style: preserve-3d;
                transform: rotateX(-45deg) rotateY(25deg) rotateZ(0deg);
                background-color: transparent;
                border: none;
            }

            .lid {
                position: absolute;
                transform-style: preserve-3d;
                transition: all 1s ease-in-out;
                transform-origin: 0 80px -120px;
                height: 80px;
                width: 250px;
                background-color: rgba(0, 0, 0, 0);
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .lid:hover,
            .button:hover .lid {
                transform: translate(-50%, -50%) rotateX(60deg);
            }

            .lid .side {
                display: inline-block;
                width: 250px;
                height: 250px;
                background-color: rgba(63, 112, 141, 0.308);
                position: absolute;
                top: 50%;
                left: 50%;
                border: solid 1px rgba(0, 132, 255, 0.226);
            }

            .front {
                transform: translate(-50%, -50%) translateZ(125px);
                height: 80px !important;
            }

            .top {
                transform: translate(-50%, -50%) rotateX(90deg) translateZ(40px);
                background-color: rgba(167, 47, 10, 0.438);
            }

            .left {
                transform: translate(-50%, -50%) rotateY(90deg) translateZ(125px);
                height: 80px !important;
            }

            .right {
                transform: translate(-50%, -50%) rotateY(-90deg) translateZ(125px);
                height: 80px !important;
            }

            .back {
                transform: translate(-50%, -50%) rotateY(180deg) translateZ(125px);
                background-color: rgba(250, 234, 18, 0.418);
                height: 80px !important;
            }

            .back::before {
                content: "";
                display: inline-block;
                position: absolute;
                width: 20px;
                height: 10px;
                background-color: black;
                bottom: 0;
                left: 10px;
            }

            .back::after {
                content: "";
                display: inline-block;
                position: absolute;
                width: 20px;
                height: 10px;
                background-color: black;
                bottom: 0;
                right: 10px;
            }

            .panels {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotateX(90deg) translateZ(-40px);
            }

            .panel-1 {
                display: inline-block;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                height: 250px;
                width: 250px;
                background-color: rgb(166, 255, 0);
                background: repeating-linear-gradient(45deg,
                        rgb(247, 243, 33) 0% 2%,
                        black 2% 4%);
                box-shadow: 0px 0px 0px 20px red;
            }

            .panel-2 {
                display: inline-block;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                height: 200px;
                width: 200px;
                background-color: rgb(0, 0, 0);
                background: linear-gradient(-135deg, rgb(43, 42, 42), black);
                border: solid 5px rgb(247, 243, 33);
            }

            .panel-1::after {
                content: "RESET ALL DATA";
                display: inline-block;
                position: absolute;
                top: 50%;
                left: 50%;
                width: 290px;
                height: 25px;
                color: white;
                font-weight: bold;
                transform: translate(-50%, -50%) translateY(170px);
                font-size: larger;
                background-color: red;
            }

            .panel-1::before {
                content: "WARNING: DANGER";
                display: inline-block;
                position: absolute;
                top: 50%;
                left: 50%;
                width: 290px;
                height: 25px;
                color: white;
                font-weight: bold;
                transform: translate(-50%, -50%) rotateZ(90deg) translateY(170px);
                font-size: larger;
                background-color: red;
            }

            .btn-trigger {
                position: absolute;
                top: 50%;
                right: 50%;
                transform: translate(-50%, -50%);
            }

            .btn-trigger-1 {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100px;
                height: 100px;
                background-color: rgb(207, 195, 195);
                box-shadow: -0px 1px 0 rgb(54, 54, 54), -0px 2px 0 rgb(54, 54, 54),
                    -1px 3px 0 rgb(54, 54, 54), -1px 4px 0 rgb(54, 54, 54),
                    -2px 5px 0 rgb(54, 54, 54), -2px 6px 0 rgb(54, 54, 54),
                    -3px 7px 0 rgb(54, 54, 54), -3px 8px 0 rgb(54, 54, 54),
                    -4px 9px 0 rgb(54, 54, 54), -4px 10px 0 rgb(54, 54, 54),
                    -5px 11px 0 rgb(54, 54, 54), -5px 12px 0 rgb(54, 54, 54),
                    -6px 13px 0 rgb(54, 54, 54), -6px 14px 0 rgb(54, 54, 54),
                    -7px 15px 0 rgb(54, 54, 54), -7px 16px 0 rgb(54, 54, 54),
                    -8px 17px 0 rgb(54, 54, 54), -8px 18px 0 rgb(54, 54, 54),
                    -9px 19px 0 rgb(54, 54, 54), -9px 20px 0 rgb(54, 54, 54),
                    -10px 21px 0 rgb(54, 54, 54), -10px 22px 0 rgb(54, 54, 54),
                    -11px 23px 0 rgb(54, 54, 54), -11px 24px 0 rgb(54, 54, 54),
                    -12px 25px 0 rgb(54, 54, 54), -12px 26px 0 rgb(54, 54, 54);
                border-radius: 50%;
                transform: translate(-50%, -50%) translateZ(50px);
            }

            .btn-trigger-2 {
                position: absolute;
                width: 80px;
                height: 80px;
                background-color: rgb(241, 17, 17);
                box-shadow: -0px 1px 0 rgb(128, 5, 5), -0px 2px 0 rgb(128, 5, 5),
                    -1px 3px 0 rgb(128, 5, 5), -1px 4px 0 rgb(128, 5, 5),
                    -2px 5px 0 rgb(128, 5, 5), -2px 6px 0 rgb(128, 5, 5),
                    -3px 7px 0 rgb(128, 5, 5), -3px 8px 0 rgb(128, 5, 5),
                    -4px 9px 0 rgb(128, 5, 5), -4px 10px 0 rgb(128, 5, 5),
                    -5px 11px 0 rgb(128, 5, 5), -5px 12px 0 rgb(128, 5, 5),
                    -6px 13px 0 rgb(128, 5, 5), -6px 14px 0 rgb(128, 5, 5),
                    -7px 15px 0 rgb(128, 5, 5), -7px 16px 0 rgb(128, 5, 5);
                border-radius: 50%;
                transition: all 0.3s;
                transform: translate(-40%, -70%) translateZ(100px);
            }

            .btn-trigger-2:active {
                transform: translate(-50%, -50%) translateZ(100px);
                box-shadow: none;
            }

            @keyframes rotate {
                100% {
                    transform: rotateX(360deg);
                }
            }
        </style>