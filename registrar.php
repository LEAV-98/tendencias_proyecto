<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="plantilla/index3.html" class="navbar-brand">
        <img src="plantilla/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TRAMITE DOCUMENTARIO</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link"><i class="fa fa-user"></i> Login</a>
          </li>
         
        </ul>

      </div>

      <!-- Right navbar links -->
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Realiza el seguimiento de tu tramite</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-12">
        <div class="row">
            <div class="col-md-6">
                    <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos del Remitente</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                            <label for="">DNI</label>
                            <div class="input-group col-12">
                            <input type="text" class="form-control" id="txt_dni">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-success" onclick="Buscar_reniec()"><i class="fa fa-search"></i></button>
                                </div>
                            <!-- /btn-group -->
                    
                            </div>
                            </div>
       
                            <div class="col-6 form-group">
                                <label for="" style="font-size:small;">NOMBRE</label>
                                <input type="text" class="form-control" id="txt_nom">
                            </div>
                            <div class="col-6 form-group">
                                <label for="" style="font-size:small;">APELLIDO PATERNO</label>
                                <input type="text" class="form-control" id="txt_apepat">
                            </div>
                            <div class="col-6 form-group">
                                <label for="" style="font-size:small;">APELLIDO MATERNO</label>
                                <input type="text" class="form-control" id="txt_apemat">
                            </div>
                            <div class="col-6 form-group">
                                <label for="" style="font-size:small;">CELULAR</label>
                                <input type="text" class="form-control" id="txt_celular">
                            </div>
                            <div class="col-6 form-group">
                                <label for="" style="font-size:small;">EMAIL</label>
                                <input type="text" class="form-control" id="txt_email">
                            </div>
                            <div class="col-12">
                                <label for="" style="font-size:small;">DIRECCIÓN</label>
                                <input type="text" class="form-control" id="txt_dire">
                            </div>     
                            <div class="col-12">
                                <label for="" style="font-size:small;">EN REPRESENTACIÓN</label>
                            </div>
                            <div class="col-12 row">
                                    <!-- radio -->
                                    <div class="col-4 form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="rad_presentacion1" name="r1" checked value="A Nombre Propio">
                                            <label for="rad_presentacion1" style="font-weight:normal;font-size:small">
                                                A Nombre Propio
                                            </label>
                                        </div>
                                    </div>        
                                    <div class="col-4 form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="rad_presentacion2" name="r1" value="A Otra Persona Natural">
                                            <label for="rad_presentacion2" style="font-weight:normal;font-size:small">
                                                A Otra Persona Natural
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-4 form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="rad_presentacion3" name="r1" value="Persona Jurídica">
                                            <label for="rad_presentacion3" style="font-weight:normal;font-size:small">
                                            Persona Jurídica
                                            </label>
                                        </div>
                                    </div>                                                            
                            </div>     
                            <div class="col-12" id="div_juridico" style="display:none">
                                <div class="row">
                                    <div class="col-4 form-group">
                                        <label for="" style="font-size:small;">RUC</label>
                                        <input type="text" class="form-control" id="txt_ruc">
                                    </div>
                                    <div class="col-8 form-group">
                                        <label for="" style="font-size:small;">RAZON SOCIAL</label>
                                        <input type="text" class="form-control" id="txt_razon">
                                    </div>
                                </div>
                            </div>
                        </div>                                     
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>
            <div class="col-md-6">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos del Documento</h3><b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="" style="font-size:small;">PROCEDENCIA DEL DOCUMENTO</label>
                                <select class="js-example-basic-single" id="select_area_p" style="width:100%">
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label for="" style="font-size:small;">AREA DE DESTINO</label>
                                <select class="js-example-basic-single" id="select_area_d" style="width:100%">
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label for="" style="font-size:small;">TIPO DOCUMENTO</label>
                                <select class="js-example-basic-single" id="select_tipo" style="width:100%">
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label for="" style="font-size:small;">Nº DOCUMENTO</label>
                                <input type="text" class="form-control" id="txt_ndocumento">
                            </div>
                            <div class="col-12 form-group">
                                <label for="" style="font-size:small;">ASUNTO DEL TRAMITE</label>
                                <textarea  id="txt_asunto" rows="3" class="form-control" style="resize:none"></textarea>
                            </div>
                            <div class="col-8 form-group">
                                <label for="" style="font-size:small;">Adjuntar documento</label>
                                <input type="file" class="form-control" id="txt_archivo">
                            </div>
                            <div class="col-4 form-group">
                                <label for="" style="font-size:small;">Nº FOLIOS</label>
                                <input type="text" class="form-control" id="txt_folio">
                            </div>
                            <div class="col-12"><br>
                                    <!-- checkbox -->
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess1" onclick="validar_informacion()">
                                        <label for="checkboxSuccess1" style="text-align:justify;">
                                            Declaro bajo penaliudad de perjurio, que toda la información proporcionada ese correcta y verídica.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" style="text-align:center">
                                <button class="btn  btn-success  btn-lg"  onclick="Registrar_Tramite()" id="btn_registro">REGISTRAR TRAMITE</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>
        </div>
    </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plantilla/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="plantilla/dist/js/demo.js"></script>
<script src="js/console_tramite_externo.js?rev=<?php echo time();?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>
<script>
      $(document).ready(function() {
        $('.js-example-basic-single').select2();
        Cargar_Select_Area();
        Cargar_Select_Tipo();
        $("#rad_presentacion1").on('click',function(){
            document.getElementById('div_juridico').style.display="none";
        });
        $("#rad_presentacion2").on('click',function(){
            document.getElementById('div_juridico').style.display="none";
        });
        $("#rad_presentacion3").on('click',function(){
            document.getElementById('div_juridico').style.display="block";
        });
      } );

      validar_informacion();
      function validar_informacion(){

          if(document.getElementById('checkboxSuccess1').checked==false){
      
             $("#btn_registro").addClass("disabled");
          }else{
             $("#btn_registro").removeClass("disabled");
          }
      }

      $('input[type="file"]').on('change', function(){
            var ext = $( this ).val().split('.').pop();
            console.log($( this ).val());
            if ($( this ).val() != '') {
            if(ext == "PDF" || ext == "pdf" || ext == "docx"|| ext == "DOCX"|| ext == "zip" || ext == "png" || ext == "PNG" || ext == "jpg" || ext == "JPG" || ext == "jpeg"  || ext == "JPEG" || ext == "rar" || ext == "xlsx"  || ext == "xls" ){
                if($(this)[0].files[0].size > 31457280){ //---- 30 MB 
                //if($(this)[0].files[0].size > 1048576){ // 1 MB
                //if($(this)[0].files[0].size > 10485760){ // ---> 10 MB
                    Swal.fire("El archivo selecionado es demasiado pesado","<label style='color:#9B0000;'>seleccionar un archivo mas liviano</label>","warning");
                    $("#txt_archivo").val("");
                    return;
                    //$("#btn_subir").prop("disabled",true);
                }else{
                    //$("#btn_subir").attr("disabled",false);
                }
                $("#txtformato").val(ext);
                }
                else
                {
                $("#txt_archivo").val("");
                Swal.fire("Mensaje de Error","Extensión no permitida: " + ext,"","error");
                }
            }
        });
    </script>