<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title> Consulta de usuarios en la BBDD </title>
    <link href="styles.css" rel ="stylesheet" type="text/css">
    <script type="text/javascript" src="index.js"></script>
</head>

<body>


<!--código PHP-->
<?php
    /**
    * Conexión con PDO
    * Guardamos los parámetros de la conexión en variables
    */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_watchlist";

    //Create connection
    $conn = new mysqli($servername,$username,$password,$dbname);
    //Check connection
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
        echo 'Error en la conexión';
    }

/**
 * Guardamos en una variable la consulta sql para mostrar los datos en la BBDD
 * En mi caso mostraremos todos los datos menos la contraseña debido a la protección
 */
    $consultasql= "SELECT `email`, `contra` FROM `usuarios`";

    if ($conn->query($consultasql) == TRUE) {
        echo '<script language="javascript">alert("Se realiza la consulta");</script>';
        echo "<b> <center>Usuarios registrados</center> </b> <br> <br>";
        //Creamos una tabla
        echo '<center><table border="0" cellspacing="10" cellpadding="10"> 
        <tr> 
          <td> <b><font face="Arial">Nombre</font> </b></td> 
          <td> <b><font face="Arial">Primer apellido</font></b> </td> 
          <td> <b><font face="Arial">Segundo apellido</font></b> </td> 
          <td> <b><font face="Arial">Email</font> </b></td> 
          <td> <b><font face="Arial">Usuario</font> </b></td> 
        </tr>';

        if ($resultado = $conn->query($consultasql)) {

            /* fetch associative array */
            while ($row = $resultado->fetch_assoc()) {
                $nombre = $row["nombre"];
                $primer_apellido = $row["primer_apellido"];
                $segundo_apellido = $row["segundo_apellido"];
                $email = $row["email"];
                $usuario = $row["usuario"]; 

        echo '<tr> 
                  <td>'.$nombre.'</td> 
                  <td>'.$primer_apellido.'</td> 
                  <td>'.$segundo_apellido.'</td> 
                  <td>'.$email.'</td> 
                  <td>'.$usuario.'</td> 
              </tr>';
            }
        
            $resultado->free();

        
        }else{
            echo 'Error al mostrar los datos';
        }
            
        echo '<a href="index.php" class="pulse" name="btnFormulario">Volver al formulario</a>';

    }else{
        echo '<script language="javascript">alert("Error al realizar la consulta");</script>';
        echo '<b>ERROR</b> <p>"No se ha podido realizar la consulta"</p>';
        echo '<a href="index.php" class="pulse" name="btnFormulario">Volver al formulario</a>';
    }
    
?>

</body>
</html>