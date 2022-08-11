var  tbl_tramite;
function listar_tramite(){
    tbl_tramite = $("#tabla_tramite").DataTable({
        "ordering":false,   
        "bLengthChange":true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"controller/tramite/controlador_listar_tramite.php",
            type:'POST'
        },
        "columns":[
            {"data":"documento_id"},
            {"data":"doc_nrodocumento"},
            {"data":"tipodo_descripcion"},
            {"data":"doc_dniremitente"},
            {"data":"REMITENTE"},
            {"defaultContent":"<button class='mas btn btn-danger btn-sm'><i class='fa fa-search'></i></button>"},
            {"defaultContent":"<button class='seguimiento btn btn-success btn-sm'><i class='fa fa-search'></i></button>"},
            {"data":"origen"},
            {"data":"destino"},
            {"data":"doc_estatus",
            render: function(data,type,row){
                        if(data=='PENDIENTE'){
                        return '<span class="badge bg-warning">PENDIENTE</span>';
                        }else if(data=='RECHAZADO'){
                        return '<span class="badge bg-danger">RECHAZADO</span>';
                        }else{
                            return '<span class="badge bg-success">FINALIZADO</span>';
                        }
                }   
            },
            
        ],
  
        "language":idioma_espanol,
        select: true
    });
}

$('#tabla_tramite').on('click','.editar',function(){
	var data = tbl_tramite.row($(this).parents('tr')).data();//En tamaño escritorio
	if(tbl_tramite.row(this).child.isShown()){
		var data = tbl_tramite.row(this).data();
	}//Permite llevar los datos cuando es tamaño celular y usas el responsive de datatable
    $("#modal_editar").modal('show');
    document.getElementById('txt_area_editar').value=data.area_nombre;
    document.getElementById('txt_idarea').value=data.area_cod;
    document.getElementById('select_estatus').value=data.area_estado;
})

$('#tabla_tramite').on('click','.seguimiento',function(){
	var data = tbl_tramite.row($(this).parents('tr')).data();//En tamaño escritorio
	if(tbl_tramite.row(this).child.isShown()){
		var data = tbl_tramite.row(this).data();
	}//Permite llevar los datos cuando es tamaño celular y usas el responsive de datatable
    $("#modal_seguimiento").modal('show');
    document.getElementById('lbl_titulo').innerHTML="SEGUIMIENTO DEL TRAMITE "+data.documento_id;
    listar_seguimiento_tramite(data.documento_id);

})

$('#tabla_tramite').on('click','.mas',function(){
	var data = tbl_tramite.row($(this).parents('tr')).data();//En tamaño escritorio
	if(tbl_tramite.row(this).child.isShown()){
		var data = tbl_tramite.row(this).data();
	}//Permite llevar los datos cuando es tamaño celular y usas el responsive de datatable
    $("#modal_mas").modal('show');
    document.getElementById('lbl_titulo_datos').innerHTML='DATOS DEL TRAMITE '+data.documento_id;
    document.getElementById('txt_ndocumento').value=data.doc_nrodocumento;
    document.getElementById('txt_folio').value=data.doc_folio;
    document.getElementById('txt_asunto').value=data.doc_asunto;
    $("#select_area_p").select2().val(data.area_origen).trigger('change.select2');
    $("#select_area_d").select2().val(data.area_destino).trigger('change.select2');
    $("#select_tipo").select2().val(data.tipodocumento_id).trigger('change.select2');

    document.getElementById('txt_dni').value=data.doc_dniremitente;
    document.getElementById('txt_nom').value=data.doc_nombreremitente;
    document.getElementById('txt_apepat').value=data.doc_apepatremitente;
    document.getElementById('txt_apemat').value=data.doc_apematremitente;
    document.getElementById('txt_celular').value=data.doc_celularremitente;
    document.getElementById('txt_email').value=data.doc_emailremitente;
    document.getElementById('txt_dire').value=data.doc_direccionremitente;
    if(data.doc_representacion=="A Nombre Propio"){
        $("#rad_presentacion1").prop('checked',true);
    }

    if(data.doc_representacion=="A Otra Persona Natural"){
        $("#rad_presentacion2").prop('checked',true);
    }

    if(data.doc_representacion=="Persona Jurídica"){
        $("#rad_presentacion3").prop('checked',true);
    }


})



function AbrirRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

function Registrar_Area(){
    let area = document.getElementById('txt_area').value;
    if(area.length==0){
        return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
    }

    $.ajax({
        "url":"controller/area/controlador_registro_area.php",
        type:'POST',
        data:{
            a:area
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                Swal.fire("Mensaje de Confirmacion","Nuevo Area Registrado","success").then((value)=>{
                    document.getElementById('txt_area').value="";
                    tbl_tramite.ajax.reload();
                    $("#modal_registro").modal('hide');
                });
            }else{
                Swal.fire("Mensaje de Advertencia","El area ingresada ya se encuentra en la base de datos","warning");
            }
        }else{
            return Swal.fire("Mensaje de Error","No se completo el registro","error");            
        }
    })
}

function Modificar_Area(){
    let id   = document.getElementById('txt_idarea').value;
    let area = document.getElementById('txt_area_editar').value;
    let esta = document.getElementById('select_estatus').value;
    if(area.length==0 || id.length==0){
        return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
    }

    $.ajax({
        "url":"controller/area/controlador_modificar_area.php",
        type:'POST',
        data:{
            id:id,
            are:area,
            esta:esta
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                Swal.fire("Mensaje de Confirmacion","Datos Actualizados","success").then((value)=>{
                    tbl_tramite.ajax.reload();
                    $("#modal_editar").modal('hide');
                });
            }else{
                Swal.fire("Mensaje de Advertencia","El area ingresada ya se encuentra en la base de datos","warning");
            }
        }else{
            return Swal.fire("Mensaje de Error","No se completo la modificacion","error");            
        }
    })
}

function Cargar_Select_Area(){
    $.ajax({
        "url":"controller/usuario/controlador_cargar_select_area.php",
        type:'POST'
    }).done(function(resp){
        let data = JSON.parse(resp);
        if(data.length>0){
            let cadena = "<option value=''>SELECCIONAR AREA</option>";
            for (let i = 0; i < data.length; i++) {
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            document.getElementById('select_area_p').innerHTML=cadena;
            document.getElementById('select_area_d').innerHTML=cadena;

        }else{
            cadena+="<option value=''>No hay areas disponibles</option>";
            document.getElementById('select_area_p').innerHTML=cadena;
            document.getElementById('select_area_d').innerHTML=cadena;
        }
    })
}

function Cargar_Select_Tipo(){
    $.ajax({
        "url":"controller/tramite/controlador_cargar_select_tipo.php",
        type:'POST'
    }).done(function(resp){
        let data = JSON.parse(resp);
        if(data.length>0){
            let cadena = "<option value=''>SELECCIONAR TIPO DOCUMENTO</option>";
            for (let i = 0; i < data.length; i++) {
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            document.getElementById('select_tipo').innerHTML=cadena;

        }else{
            cadena+="<option value=''>No hay tipos disponibles</option>";
            document.getElementById('select_tipo').innerHTML=cadena;
        }
    })
}

function Registrar_Tramite(){
    //DATOS DEL REMITENTE
    let dni = document.getElementById('txt_dni').value;
    let nom = document.getElementById('txt_nom').value;
    let apt = document.getElementById('txt_apepat').value;
    let apm = document.getElementById('txt_apemat').value;
    let cel = document.getElementById('txt_celular').value;
    let ema = document.getElementById('txt_email').value;
    let dir = document.getElementById('txt_dire').value;
    let idusu = "";

    let presentacion = document.getElementsByName("r1");
    let vpresentacion = "";
    for (let i = 0; i < presentacion.length; i++) {
        if(presentacion[i].checked){
            vpresentacion=presentacion[i].value;
        }
        
    }
    let ruc = document.getElementById('txt_ruc').value;
    let raz = document.getElementById('txt_razon').value;

    //DATOS DOCUMENTO 
    let arp = document.getElementById('select_area_p').value;
    let ard = document.getElementById('select_area_d').value;
    let tip = document.getElementById('select_tipo').value;
    let ndo = document.getElementById('txt_ndocumento').value;
    let asu = document.getElementById('txt_asunto').value;
    let arc = document.getElementById('txt_archivo').value;
    let fol = document.getElementById('txt_folio').value;

    if(arc.length==0){
        return Swal.fire("Mensaje de Advertencia","Seleccine algun tipo de documento","warning");
    }

    let extension = arc.split('.').pop();//DOCUMENTO.PPT
    let nombrearchivo = "";
    let f =  new Date();
    if(arc.length>0){
        nombrearchivo="ARCH"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMilliseconds()+"."+extension;
    }
    if(dni.length==0 || nom.length==0 || apt.length==0 || apm.length==0 || cel.length==0 || ema.length==0 || dir.length==0 ){
        return Swal.fire("Mensaje de Advertencia","Llene todos los datos del remitente","warning");
    }

    if(arp.length==0 || tip.length==0 || ndo.length==0 || asu.length==0 || ard.length==0 || fol.length==0 ){
        return Swal.fire("Mensaje de Advertencia","Llene todos los datos del documento","warning");
    }

    let formData = new FormData();
    let archivoobj = $("#txt_archivo")[0].files[0];//El objeto del archivo adjuntado
    //////DATOS DEL REMITENTE
    formData.append("dni",dni);
    formData.append("nom",nom);
    formData.append("apt",apt);
    formData.append("apm",apm);
    formData.append("cel",cel);
    formData.append("ema",ema);
    formData.append("dir",dir);
    formData.append("vpresentacion",vpresentacion);
    formData.append("ruc",ruc);
    formData.append("raz",raz);
    //////DATOS DEL DOCUMENTO
    formData.append("arp",arp);
    formData.append("ard",ard);
    formData.append("tip",tip);
    formData.append("ndo",ndo);
    formData.append("asu",asu);
    formData.append("nombrearchivo",nombrearchivo);
    formData.append("fol",fol);
    formData.append("archivoobj",archivoobj);
    formData.append("idusu",idusu);
    $.ajax({
        url:"controller/tramite/controlador_registro_tramite.php",
        type:'POST',
        data:formData,
        contentType:false,
        processData:false,
        success: function(resp){
            if(resp.length>0){
                Swal.fire("Mensaje de Confirmacion","Nuevo tramite registrado codigo "+resp,"success").then((value)=>{
                    window.open("view/MPDF/REPORTE/ticket_tramite.php?codigo="+resp+"#zoom=100");
                    $("#contenido_principal").load("tramite/view_tramite.php");
                });
            }else{
                Swal.fire("Mensaje de Advertencia","El Usuairo ingresado ya se encuentra en la base de datos","warning");
            }
        }
    });
    return false;
}

function Buscar_reniec() {
    var dni = $("#txt_dni").val();
    var input = document.getElementById('txt_dni');
    if (localStorage.getItem('_token') == null) {
        Swal.fire({
            title: "Mensaje de Advertencia",
            html: "<b style='color:#9B0000;font-size:20px'>Acceso no autorizado!!!</b><br><b style='font-size:14px'><b style='color:#9B0000;'>Membres&iacute;a vencida</b>, para mayor informaci&oacute;n comun&iacute;quese con su proveedor</b>",
            imageUrl: "Vista/img/reniec.png",
            imageWidth: 120,
            imageHeight: 115,
            imageAlt: "Cargando...",
        });
        return;
    }
    if(input.value.length < 8) {
        $('#txt_dni').focus();
        $("#txt_dni").removeClass('is-valid').addClass("is-invalid");
        return Swal.fire("Mensaje de Advertencia","El campo <b>dni</b>  debe tener como minimo 8 d&iacute;gitos","warning");  
    }
    else{
        $("#txt_dni").removeClass('is-invalid').addClass("is-valid");
    }
    $.ajax({
        url:'https://www.reniec.softnetpe.com/api/auth/dni',
        type:'POST',
        headers: { 
            'Authorization':'Bearer '+localStorage.getItem('_token'),
            'Content-Type': 'application/json' ,
            'X-Requested-With': 'XMLHttpRequest'
        },
        data:JSON.stringify({
            num_documento : dni,
        })
    })
    .done(function(resp) {
        if (resp['name']!=undefined) {
            $("#txt_dni").prop('disabled',true);
            $("#btn_reniec").prop('disabled',true);
            $("#txt_nom").val(resp['name'].replace("'", ""));
            $("#txt_apepat").val(resp['first_name'].replace("'", ""));
            $("#txt_apemat").val(resp['last_name'].replace("'", ""));
        }else{
            $("#txt_nom").val("");
            $("#txt_apepat").val("");
            $("#txt_apemat").val("");
            Swal.fire("Mensaje de Advertencia","<b style='color:#9B0000'>Lo sentimos el dni ingresado no se encuentro en los archivos de la reniec</b>","warning");
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown){
        if (jqXHR.status === 0) {
            Swal.fire("Mensaje de Error","<b>No se pudo procesar la solicitud,</b><b style='color:#9B0000;'>SIN ACCESO A INTERNET</b>","error");
        }
        if (jqXHR.status === 401) {
            Swal.fire({
                title: "Mensaje de Advertencia",
                html: "<b style='color:#9B0000;font-size:20px'>Acceso no autorizado!!!</b><br><b style='font-size:14px'><b style='color:#9B0000;'>Membres&iacute;a vencida</b>, Para mayor informaci&oacute;n comun&iacute;quese con su proveedor</b>",
                imageUrl: "https://softnetpe.com/Sistema_MesaPartes_reniec/Vista/img/reniec.png",
                imageWidth: 120,
                imageHeight: 115,
                imageAlt: "Cargando...",
            });
        }
    })
}


///SEGUIMIENTO TRAMITE
var  tbl_seguimiento;
function listar_seguimiento_tramite(id){
    tbl_seguimiento = $("#tabla_seguimiento").DataTable({
        "ordering":false,   
        "bLengthChange":true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"controller/tramite/controlador_listar_tabla_seguimiento_tramite.php",
            type:'POST',
            data:{
                id:id
            }
        },
        "columns":[
            {"data":"area_nombre"},
            {"data":"mov_fecharegistro"},
            {"data":"mov_descripcion"},
            {"data":"mov_archivo",
            render: function(data,type,row){
                        if(data==''){
                        return "<button class='btn btn-danger btn-sm'><i class='fa fa-file-pdf' disabled></i></button>";
                        }else{
                        return "<button class='ver btn btn-danger btn-sm'><i class='fa fa-file-pdf'></i></button>";
                        }
                }   
            
            },
            
        ],
  
        "language":idioma_espanol,
        select: true
    });
}


