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
    $email = $_POST['email'];
    $contra = $_POST['contra'];

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

    //consulta para saber si un usuario se encuentra registrado, con un filtraje de email y usuario
    $consultausuario = "SELECT `email`, `contra` FROM `usuarios` WHERE email='$email' and contra='$contra'";
    $consultaid = "SELECT `id_usuario` FROM `usuarios` WHERE email='$email' and contra='$contra'";

    //Guardamos en una variable la consulta, para contar si nos devuelve filas con la consultausuario
    $result = mysqli_num_rows(mysqli_query($conn,$consultausuario));
    $resultado_id = $conn->query($consultaid);
    //Dentro de un if-else ejecutamos la consulta guardada en las variables anteriores
    if($result === 0){
        //No encuentra datos
        echo '<script language="javascript">alert("ERROR \n Los datos introducidos no se encuentran en nuestra base de datos.");location.href="login.html";</script>';  
        
                
    }else{
        //en el caso de que encuentre un registro
        session_start();
        $_SESSION["id_usuario"]=$resultado_id;
        echo '<script language="javascript">location.href="menu_ppal.php";</script>'; 
    }
    
  
    //Cerramos la conexión
    $conn->close();
    }
?>
</body>
</html>