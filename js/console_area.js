var tbl_area;
function listar_area() {
  tbl_area = $("#tabla_area").DataTable({
    ordering: false,
    bLengthChange: true,
    searching: { regex: false },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controller/area/controlador_listar_area.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "" },
      { data: "area_nombre" },
      { data: "area_fecha_registro" },
      {
        data: "area_estado",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return '<span class="badge bg-success">ACTIVO</span>';
          } else {
            return '<span class="badge bg-danger">INACTIVO</span>';
          }
        },
      },
      {
        defaultContent:
          "<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>",
      },
    ],

    language: idioma_espanol,
    select: true,
  });
  tbl_area.on("draw.td", function () {
    var PageInfo = $("#tabla_area").DataTable().page.info();
    tbl_area
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$("#tabla_area").on("click", ".editar", function () {
  var data = tbl_area.row($(this).parents("tr")).data(); //En tamaño escritorio
  if (tbl_area.row(this).child.isShown()) {
    var data = tbl_area.row(this).data();
  } //Permite llevar los datos cuando es tamaño celular y usas el responsive de datatable
  $("#modal_editar").modal("show");
  document.getElementById("txt_area_editar").value = data.area_nombre;
  document.getElementById("txt_idarea").value = data.area_cod;
  document.getElementById("select_estatus").value = data.area_estado;
});

function AbrirRegistro() {
  $("#modal_registro").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro").modal("show");
}

function Registrar_Area() {
  let area = document.getElementById("txt_area").value;
  if (area.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/area/controlador_registro_area.php",
    type: "POST",
    data: {
      a: area,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de Confirmacion",
          "Nuevo Area Registrado",
          "success"
        ).then((value) => {
          document.getElementById("txt_area").value = "";
          tbl_area.ajax.reload();
          $("#modal_registro").modal("hide");
        });
      } else {
        Swal.fire(
          "Mensaje de Advertencia",
          "El area ingresada ya se encuentra en la base de datos",
          "warning"
        );
      }
    } else {
      return Swal.fire(
        "Mensaje de Error",
        "No se completo el registro",
        "error"
      );
    }
  });
}

function Modificar_Area() {
  let id = document.getElementById("txt_idarea").value;
  let area = document.getElementById("txt_area_editar").value;
  let esta = document.getElementById("select_estatus").value;
  if (area.length == 0 || id.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Tiene campos vacios",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/area/controlador_modificar_area.php",
    type: "POST",
    data: {
      id: id,
      are: area,
      esta: esta,
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        Swal.fire(
          "Mensaje de Confirmacion",
          "Datos Actualizados",
          "success"
        ).then((value) => {
          tbl_area.ajax.reload();
          $("#modal_editar").modal("hide");
        });
      } else {
        Swal.fire(
          "Mensaje de Advertencia",
          "El area ingresada ya se encuentra en la base de datos",
          "warning"
        );
      }
    } else {
      return Swal.fire(
        "Mensaje de Error",
        "No se completo la modificacion",
        "error"
      );
    }
  });
}
