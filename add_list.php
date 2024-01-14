<!--@author Alessandra-Marie Bayot Diana 
IDE: Visual Studio Code 1.79.0 -->

<!--código PHP-->
<!doctype html>
<html>
<body>
<?php
    if($_POST){
    //Instanciamos las variables con los datos introducidos por el usuario
    $id_movie= $_POST['id_movie'];

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

    $consultagregar = "INSERT INTO `listas`(`movies_id_movie`)VALUES ('$id_movie')";

    //Dentro de un if-else ejecutamos la consulta guardada en las variables anteriores

        if($conn->query($consultaagregar) == TRUE){
            echo '<script language="javascript">alert("Lista creada correctamente");location.href="menu_ppal.php";</script>';  
        }else{
            echo '<script language="javascript">alert("ERROR");location.href="menu_ppal.php";</script>'; 
        }

    
  
    //Cerramos la conexión
    //$conn->close();
    }
?>
</body>
</html>