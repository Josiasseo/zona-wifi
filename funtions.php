<?php

	header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    //CONEXION BD
    function conexBD(){
    	$conex = new mysqli("127.0.0.1", "root", "", "zona_wifi");
    	$conex->query("SET NAMES 'utf8'");
	    if (mysqli_connect_errno()) {
	        die("Error al conectar: ".mysqli_connect_error());
	    }
	    return $conex;
    }

    function disconnectDB($conex){

	    $close = mysqli_close($conex) 
	        or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

	    return $close;
	}
    
	function llenadoTabla($lugar){
		$conexBD = conexBD();
		$sql = "SELECT u.idusuario,u.nombre,u.telefono,u.correo,u.lugar,DATE_FORMAT(f.fecha, '%d-%m-%Y') as fecha FROM usuario u LEFT JOIN frecuencia f ON u.idusuario=f.idusuario LEFT JOIN dispositivos d ON f.iddispositivos=d.iddispositivos WHERE lugar='$lugar' group by mac ORDER BY fecha ASC;";
      	$result = $conexBD->query($sql);
      	while($row = $result->fetch_array(MYSQLI_ASSOC)){
              echo "
                <tr>
                  <td style='display:none;' name='iduser'>".$row["idusuario"]."</td>
                  <td>".$row["fecha"]."</td>
                  <td>".$row["nombre"]."</td>
                  <td>".$row["telefono"]."</td>
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
      	disconnectDB($conexBD);
	}

	function selectLugar(){
		$conexBD = conexBD();
		$sql = "SELECT lugar FROM usuario GROUP BY lugar;";
		$result = $conexBD->query($sql);
		return $result;
		disconnectDB($conexBD);
	}

?>
