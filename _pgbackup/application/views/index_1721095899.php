<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Signin Template · Bootstrap v5.0</title>
        <!-- Bootstrap core CSS -->
        <link href="../../css/theme.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="sign-in.css" rel="stylesheet">
        <script>/* Pinegrow Interactions, do not remove */ (function(){try{if(!document.documentElement.hasAttribute('data-pg-ia-disabled')) { window.pgia_small_mq=typeof pgia_small_mq=='string'?pgia_small_mq:'(max-width:767px)';window.pgia_large_mq=typeof pgia_large_mq=='string'?pgia_large_mq:'(min-width:768px)';var style = document.createElement('style');var pgcss='html:not(.pg-ia-no-preview) [data-pg-ia-hide=""] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show=""] {opacity:1;visibility:visible;display:block;}';if(document.documentElement.hasAttribute('data-pg-id') && document.documentElement.hasAttribute('data-pg-mobile')) {pgia_small_mq='(min-width:0)';pgia_large_mq='(min-width:99999px)'} pgcss+='@media ' + pgia_small_mq + '{ html:not(.pg-ia-no-preview) [data-pg-ia-hide="mobile"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="mobile"] {opacity:1;visibility:visible;display:block;}}';pgcss+='@media ' + pgia_large_mq + '{html:not(.pg-ia-no-preview) [data-pg-ia-hide="desktop"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="desktop"] {opacity:1;visibility:visible;display:block;}}';style.innerHTML=pgcss;document.querySelector('head').appendChild(style);}}catch(e){console&&console.log(e);}})()</script>
    </head>
    <body class="text-center">
        <main class="form-signin" data-pg-ia='{"l":[{"trg":"load","a":"slideInDown"}]}'>
            <form>
                <h1 class="h3 mb-3 fw-normal">Identifiez-vous</h1>
                <label for="inputEmail" class="visually-hidden">Email address</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Numero d'imatriculation" required="" autofocus="">
                <label for="inputPassword" class="visually-hidden">Password</label>
                <input type="text" id="inputPassword" class="form-control" placeholder="Type du voiture " required="">
                <div class="checkbox mb-3">
</div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
                <p class="mt-5 mb-3 text-muted">© 2017-2021</p>
            </form>
        </main>
        <script src="assets/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="../../pgia/lib/pgia.js"></script>
    </body>
</html>
