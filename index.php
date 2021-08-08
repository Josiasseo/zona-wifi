<?php include_once ('funtions.php') ?>

<!doctype html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Zonas WiFi</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/Favicon-Maraveca.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <!-- MDBootstrap Datatables  -->
    <link href="css/datatables.min.css" rel="stylesheet"> 

    
  </head>
  <body>
    <?php
      
    ?>
    

    <div class="container text-center" style="margin-top: 2%;">
      <div class="row">
        <div class="col">
          <img src="img/Logo-Maraveca-Large.png" width="30%">
        </div>
      </div>

      <div class="row" style="margin-top: 2%; margin-bottom: 2%;">
        <div class="col" >
          <h1>Usuarios Zonas WiFi</h1>
        </div>
      </div>

      <form id="filtro-usuarios" class="row" style="margin-bottom: 3%;">
        <div class="col-12">
          <div class="row">
            <div class="col-md-2 col-form-label" style="font-weight: 500;">Selecione Lugar</div>
            <div class="col-sm-3">
              <select class="form-control" aria-label="Default select example" onchange='llenadoTabla(this.value)'>
                <option>Seleccione</option>
                <?php 
                    $selec = selectLugar();
                    while($row = $selec->fetch_array(MYSQLI_ASSOC)){
                    echo "<option value=".$row["lugar"].">".$row["lugar"]."</option>";}
                ?>
              </select>
            </div>
            <div class="col-md-2 col-form-label">
              <div style="font-weight: 500;" class="">Filtro por fecha</div>
            </div>
            <div class="col-md-2">
              <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio" max="2021-06-01" required="">
            </div>
            <div class="col-md-2">
              <input type="date" name="fecha_fin" class="form-control" id="fecha_fin" max="2021-06-01" required="">
            </div>

            <div class="col-md-1">
              <button type="submit" id="buttom-search" class="btn btn-info"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </form>  

          <table id="dtBasicExample" class="table table-bordered table-sm table-striped" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="display:none;">ID</th>
              <th class="th-sm">Fecha</th>
              <th class="th-sm">Nombre</th>
              <th class="th-sm">Teléfono</th>
              <th class="th-sm">Correo</th>
              <th class="th-sm"></th>
            </tr>
          </thead>
          <tbody id="cuerpoTabla">
            
           </tbody>
            <tfoot>
              <tr>
                <td class="th-sm">Fecha</td>
                <th class="th-sm">Nombre</th>
                <th class="th-sm">Teléfono</th>
                <th class="th-sm">Correo</th>
                <th class="th-sm"></th>
              </tr>
            </tfoot>
          </table>



    </div>







   



    <!-- End your project here-->
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="js/datatables.min.js"></script>

     <script>
        $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
        });

    </script>
  </body>
</html>