<!--@author Alessandra-Marie Bayot Diana 
IDE: Visual Studio Code 1.79.0 -->

<!--código PHP-->
<!doctype html>
<html>
<body>
<?php
    if($_POST){
    /**
     * Si el usuario ha introducido datos se produce las acciones dentro del if
    * En nuestro caso hemos indicado de igual manera que se deben rellenar las casillas
    */
    //Instanciamos las variables con los datos introducidos por el usuario
    $id_movie= $_POST['id_movie'];
    //echo $id_movie;

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

    //borramos los datos de la lista
    $sql = "DELETE FROM `movies` WHERE id_movie='$id_movie'";

    if ($conn->query($sql) == TRUE) {   
        //Si se elimina mostramos por pantalla un mensaje al usuario
        echo '<script language="javascript">alert("Se ha eliminado correctamente la película de la lista.");location.href="show_lists.php";</script>';  
    }else{
        echo '<script language="javascript">alert("ERROR \n No se ha podido eliminar la película de la lista.");location.href="show_lists.php";</script>';  
    } 

    //Cerramos la conexión
    $conn->close();
    }
?>
</body>
</html>