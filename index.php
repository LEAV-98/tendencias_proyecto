<?php
    session_start();
    if(isset($_SESSION['S_ID'])){
      header('Location: view/index.php');

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>LOGIN TRAMITE DOCUMENTARIO</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">DATOS DEL USUARIO</p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="usuario" id="txt_usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="txt_contra">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" onclick="Iniciar_Sesion()">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>

      <p class="mb-1">
        <a href="seguimiento.php">Rastrear Tramite</a>
      </p>
      <p class="mb-1">
        <a href="registrar.php">Registrar Tramite</a>
      </p>
  
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plantilla/dist/js/adminlte.min.js"></script>
<script src="js/console_usuario.js?rev=<?php echo time();?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  const rmcheck      = document.getElementById('remember'),
        usuarioInput = document.getElementById('txt_usuario'), 
        passInput    = document.getElementById('txt_contra');
  if(localStorage.checkbox && localStorage.checkbox !=""){
    rmcheck.setAttribute("checked","checked");
    usuarioInput.value= localStorage.usuario;
    passInput.value   = localStorage.pass;
  }else{
    rmcheck.removeAttribute("checked");
    usuarioInput.value= "";
    passInput.value   = "";
  }
  
</script>
</body>
</html>
