$(function () {
  $('#subida').submit(function() {
    var comprobar = $('#title').val().length* $('#foto').val().length*$('#desc').val().length;   
    if (comprobar > 0) {
      var imagen = document.getElementById("foto").files;
      if (imagen[0].type != "image/png" && imagen[0].type != "image/jpg" && imagen[0].type != "image/jpeg") {
        $('#cargando').modal('show');
        $('#cargando h3').text("El archivo " + imagen[0].name + " no es una imagen");
        return false;
      } else {
        if (imagen[0].size > 1024 * 1024 * 2) {
          $('#cargando').modal('show');
          $('#cargando h3').text("El archivo " + imagen[0].name + " sobrepasa el peso permitido");
          return false;
        } else {
          var formulario = $('#subida');
          var datos = formulario.serialize();
          var archivos = new FormData();
          var url = 'php/Upload_Photo.php';
          for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {
            archivos.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));
          }
          $.ajax({
            url: url + '?' + datos,
            type: 'POST',
            contentType: false,
            data: archivos,
            processData: false,
            beforeSend: function() {
              $('#cargando').modal('show');
               $('#cargando h3').text('Subiendo imagen...');
            },
            success: function (data) {
              $('#cargando h3').text('Imagen subida correctamente.');
              setTimeout(function () {
                $(location).attr('href', 'images.php');
              }, 800);
            },
            error: function(data) {
              $('#cargando h3').text('Ocurrio un error: ' + $.parseJSON(data.responseText).message);
            }
          });
          return false;
        }
      }
    } else {
      $('#cargando').modal('show');
      $('#cargando h3').text("Llena todos los campos");
      return false;
    }
  });
});
