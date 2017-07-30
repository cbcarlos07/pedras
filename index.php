<?php
$login = "";
$senha = "";
$checked = "";
if(isset($_COOKIE['login'])){
    $login = $_COOKIE['login'];
    $senha = $_COOKIE['senha'];
    $checked = "checked";

}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <p style="font-size: 30px; font-weight: bold; color: #ffffff">PEDRAS</p>
                </div>
            <div class="col-md-4 col-md-offset-4">

                <p class="alerta-login alert "></p>
                <div class="login-panel panel panel-default ">

                    <div class="panel-heading">

                        <h3 class="panel-title">Por favor, informe seu login e senha</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="login" placeholder="Login" name="login" type="text" autofocus
                                    value="<?= $login; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="senha" placeholder="Password" name="password" type="password"
                                           value="<?= $senha; ?>">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" id="lembrar" type="checkbox" <?= $checked; ?> >Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="#btn" class="btn btn-lg btn-success btn-block btn-logar">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/login.js"></script>

</body>

</html>
