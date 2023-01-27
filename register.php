<?php 
include_once("class/user.php");
$user = new User();
if(isset($_POST['submit'])){
  $user->register($_POST);
}

?>
<!DOCTYPE html>
<html lang="pt'pt">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ESPB - Registar</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/alerta.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Regista-te!</h1>
              </div>
              <form class="user"  method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="name" placeholder="Primeiro nome" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" name="last_name" placeholder="Último nome ">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email " required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="palavra-passe" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="repeatPassword" placeholder="Repita a palavra-passe" required>
                  </div>
                </div>
                <input type="submit" name="submit" value=" Criar conta" class="btn btn-primary btn-user btn-block">
                <hr>

              </form>
              
              <?php
              if (isset($_GET['msgp']) == "pass") {
              ?>
                <div class="alerta ">
                <span class="icon text-white-50">
                      <i class="fas fa-exclamation-triangle"></i>
                    </span> 
                  <span class="btnFechar" onclick="this.parentElement.style.display='none';">&times;</span>
                  <strong>Palavra-passes</strong> diferentes, por favor tente novamente.
                </div>
              <?php
              }

              if (isset($_GET['msge']) == "erro") {
                ?>
                  <div class="alerta " style="background-color: #e74a3b;">
                  <span class="icon text-white-50" style="color: #e74a3b;">
                      <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    <span class="btnFechar" onclick="this.parentElement.style.display='none';">&times;</span>
                    Ocorreu um erro ao criar a sua conta. Por favor tente novamente!
                  </div>
                <?php
                }

              ?>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Esqueceu a palavra-passe??</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Já tens uma conta? Entar!</a>
              </div>
              <div class="text-center">
                    <a href="http://www.espb.edu.ao">www.espb.edu.ao</a>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>