<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Garazy</title>
        <!-- Pour admin/home.php -->
        <link rel="shortcut icon" href="<?php echo base_url('favicon.ico');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-icons/font/bootstrap-icons.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/pinekit_theme/pinekit.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('css/admin/style.css');?>">
        <!-- Pour admin/devis.php -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-icons/font/bootstrap-icons.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendors/typicons.font/font/typicons.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendors/css/vendor.bundle.base.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendors/vertical-layout-light/style.css'); ?>">
        <!-- Pour admin/service.php -->
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/admin/service.css');?>">

		<script src='<?php echo base_url('assets/dist/index.global.js')?>'></script>

	</head>
    <body>
        <header>
</header>
        <nav class="bg-white navbar navbar-expand-lg navbar-light" style="position:fixed; width : 100%">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown-1" aria-controls="navbarNavDropdown-1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> 
                </button>
                <span class="fw-bold placeholder-wave text-primary" style="font-size: 39px;">Garazy</span>
                <div class="collapse navbar-collapse " id="navbarNavDropdown-1" style="margin-left: 16.696%;"> 
                    <ul class="ms-auto navbar-nav"> 
                        <li class="nav-item"> <a class="active nav-link" aria-current="page" href="<?php echo site_url('Home'); ?>">Home</a> 
                        </li>                         
                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Devis'); ?>">Devis</a></li>                         
                        <li class="nav-item"> <a class="nav-link" href="rdv">Rendez-vous</a></li>                         
                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Service'); ?>">Services</a></li>                                             
                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Donnee'); ?>">Importation donées</a></li>                                             

                    </ul>                     
                </div>
            </div>             
        </nav>
        <script src="<?php echo base_url('assets/admin/assets/js/login.js'); ?>">
            document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.scroll-effect');
    const options = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, options);

    elements.forEach(element => {
        observer.observe(element);
    });
});
        </script>
