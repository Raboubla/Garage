<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Garazy</title>
    <!-- Pour admin/home.php -->
    <link rel="shortcut icon" href="<?php echo base_url('favicon.ico'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-icons/font/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/pinekit_theme/pinekit.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/admin/style.css'); ?>">
    <!-- Pour admin/devis.php -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-icons/font/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendors/typicons.font/font/typicons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendors/css/vendor.bundle.base.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendors/vertical-layout-light/style.css'); ?>">
    <!-- Pour admin/service.php -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/admin/service.css'); ?>">

    <script src='<?php echo base_url('assets/dist/index.global.js') ?>'></script>

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
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
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Donnee'); ?>">Importation données</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button">Dashboard</a>
                        <ul class="dropdown-content" id="servicesDropdownMenu">
                            <li><a href="slot">Slot</a></li>
                            <li><a href="chiffreDaffaire">Chiffre d'affaire</a></li>
                            <li><a href="chiffreDaffaireByType">Chiffre d'affaire par type voiture</a></li>
                            <li><a href="#service2">Nombre voiture</a></li>
                        </ul>
                    </li>
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

        function addService() {
            const dropdown = document.getElementById('servicesDropdownMenu');
            const newService = document.createElement('li');
            const newLink = document.createElement('a');
            newLink.href = '#service3';
            newLink.textContent = 'Service 3';
            newService.appendChild(newLink);
            dropdown.appendChild(newService);
        }
    </script>
    <button onclick="addService()">Ajouter un service</button>

