<?php 
	include_once ('funtions.php');
	$conexBD = conexBD();

	$sql = "SELECT u.idusuario,u.nombre,u.telefono,u.correo,u.lugar,DATE_FORMAT(f.fecha, '%d-%m-%Y') as fecha FROM usuario u LEFT JOIN frecuencia f ON u.idusuario=f.idusuario LEFT JOIN dispositivos d ON f.iddispositivos=d.iddispositivos WHERE lugar='$lugar' group by mac ORDER BY fecha ASC;";
      	$result = $conexBD->query($sql);
      	while($row = $result->fetch_array(MYSQLI_ASSOC)){
          echo "
            <tr>
              <td style='display:none;' name='iduser'>".$row["idusuario"]."</td>
              <td>".$row["fecha"]."</td>
              <td>".$row["nombre"]."</td>
              <td>".$row["telefonoo"]."</td>
              <td>".$row["correo"]."</td>
              <td>
                <form method='POST' action='' id='form_delete_user'>
                  <button type='submit' class='btn btn-danger'>
                    <i id='eliminar-user' class='fas fa-trash-alt'></i>
                  </button>
                </form>
              </td>
            </tr>";
         }

    if($conexBD->affected_rows > 0 ){
        $respuesta = 'exito';
    }else{
        $respuesta = 'error_insert_fracuencia_si';
    }

    $mysqli->close();
	echo json_encode($respuesta);

 ?>