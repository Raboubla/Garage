<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Signin Template · Bootstrap v5.0</title>
        <!-- Bootstrap core CSS -->
        <link href="../../css/theme.css" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/pinekit_theme/pinekit.css');?>"> -->
        <link  href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('css/sign-in.css');?>" rel="stylesheet">
        <script>/* Pinegrow Interactions, do not remove */ (function(){try{if(!document.documentElement.hasAttribute('data-pg-ia-disabled')) { window.pgia_small_mq=typeof pgia_small_mq=='string'?pgia_small_mq:'(max-width:767px)';window.pgia_large_mq=typeof pgia_large_mq=='string'?pgia_large_mq:'(min-width:768px)';var style = document.createElement('style');var pgcss='html:not(.pg-ia-no-preview) [data-pg-ia-hide=""] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show=""] {opacity:1;visibility:visible;display:block;}';if(document.documentElement.hasAttribute('data-pg-id') && document.documentElement.hasAttribute('data-pg-mobile')) {pgia_small_mq='(min-width:0)';pgia_large_mq='(min-width:99999px)'} pgcss+='@media ' + pgia_small_mq + '{ html:not(.pg-ia-no-preview) [data-pg-ia-hide="mobile"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="mobile"] {opacity:1;visibility:visible;display:block;}}';pgcss+='@media ' + pgia_large_mq + '{html:not(.pg-ia-no-preview) [data-pg-ia-hide="desktop"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="desktop"] {opacity:1;visibility:visible;display:block;}}';style.innerHTML=pgcss;document.querySelector('head').appendChild(style);}}catch(e){console&&console.log(e);}})()</script>
    </head>
    <body class="text-center">
        <main class="form-signin" data-pg-ia='{"l":[{"trg":"load","a":"slideInDown"}]}'>
            <form id="formulaire" action="<?php echo site_url('Login/loginUser'); ?>" method="post">
                <h1 class="h3 mb-3 fw-normal">Identifiez-vous</h1>
                <label for="inputEmail" class="visually-hidden">Email address</label>
                <input type="text" id="inputEmail" name="numero" class="form-control" placeholder="Numero d'imatriculation" required="" autofocus="">
                        <select id="serviceType" name="type" class="form-select" required>
                            <option selected disabled value="">Type de voiture</option>
                        </select>           
                <div class="checkbox mb-3">
</div>
                <button class="w-100 btn btn-lg " style="background-color: black; color: white" type="submit">Valider</button>
                <p class="mt-5 mb-3 text-muted">© 2024</p>
            </form>
        </main>
        <script src="<?php echo base_url('assets/admin/assets/js/popper.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('../../pgia/lib/pgia.js');?>"></script>
        <script type="text/javascript">
            window.addEventListener("load", function () {
                function getAllType() {

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
                                if (response.success && response.types != null) {
                                    var types = response.types;
                                    select.innerHTML = '';
                                    for (var i = 0; i < types.length; i++) {
                                        var op = document.createElement('option');
                                        op.innerHTML = types[i].type;
                                        op.value = types[i].id;
                                        select.appendChild(op);
                                    }
                                } else {

                                }
                            } else {
                                console.error("Erreur de requête AJAX");
                            }
                        }
                    };

                    xhr.open("POST", "<?php echo site_url('TypeVoitureController/getAll'); ?>", true);
                    xhr.send(null);
                }
                var form = document.getElementById("formulaire");

                getAllType();
            });
        </script>
    </body>
</html>
