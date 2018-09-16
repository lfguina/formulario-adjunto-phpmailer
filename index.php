<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <title>Formulario!</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center mt-3 pt-5">
            <div class="col-md-7 contenedor">
                <h1 class="display-4 encabezado" >Formulario</h1>
                <hr class=bg-info>
                <p class="pb-0 mb-0 infor">Te invitamos a contactarnos con nosotros</p>
                <p class="text-danger small ">Todos los campos obligatorios</p>

                <div class="alert alert-success d-none" id="msgExito">Enviado con exito</div>
                <div class="alert alert-danger d-none" id="msgError"></div>


                <!--Poner atributo multipart-->
                <form  id="formulario" enctype="multipart/form-data" novalidate>
                    <div class="form-group row">
                        <label for="nombre" class="col-form-label col-md-3">Nombre:</label>
                        <div class="col-md-9">
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-form-label col-md-3">E-mail:</label>
                        <div class="col-md-9">
                        <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="mensaje" class="col-form-label col-md-3">Adjunto:</label>
                        <div class="col-md-9">
                            <input class="form-control-file" type="file" name="archivo" id="archivo">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mensaje" class="col-form-label col-md-3">Mensaje:</label>
                        <div class="col-md-9">
                            <textarea name="mensaje" id="mensaje" class="form-control" required rows=0></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="envio">
                    <input type="submit" class="btn btn-info" value="Enviar formulario">
                </form>
            </div>
        </div>
    </div>





    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="formulario.js"></script>
  </body>
</html>