<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin</title>
        <link href="../../../pinekit_theme/pinekit.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/css/admin/login.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin/assets/js/login.js'); ?>" rel="stylesheet">
        <!-- <link rel="stylesheet" href="../../../assets/bootstrap/admin/bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../../../assets/css/admin/login.css"> -->
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-left: 40%; margin-top: 15%;">
                <div class="form-container">
                    <div class="logo-container" style="font-size: 30px;">Sign In</div>
                    <form class="form" action="<?php echo site_url('Login/LoginAdmin'); ?>" method="post">
                        <div class="form-group">
                            <label for="email">Login</label>
                            <input type="text" id="email" name="login" placeholder="Enter your login" required="" style="width: 90%;" value="admin">
                            <label for="email">Password</label>
                            <input type="password" id="email" name="mdp" placeholder="Enter your password" required="" style="width: 90%;" value="admin">
                        </div>
                        <button class="form-submit-btn" type="submit">Connect</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>