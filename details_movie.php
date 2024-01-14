<!doctype html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel ="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Ficha tecnica de la película</title>
    </head>

<body>
<header class="p-3 text-bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <h2> Watchlist Netflix</h2>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="menu_ppal.php" class="nav-link px-2 text-white">Inicio</a></li>
              <li><a href="show_movies.php" class="nav-link px-2 text-white">Filtrar Películas</a></li>
              <li><a href="show_lists.php" class="nav-link px-2 text-white">Mis Listas</a></li>
              <li><a href="about.php" class="nav-link px-2 text-white">About</a></li>
            </ul>
    
            <div class="text-end">
              <button type="button" class="btn btn-warning"><a href="login.html">Login</a></button>
            </div>
          </div>
        </div>
      </header>

<!--código PHP-->
    <?php
    if($_POST){
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
    //echo '<script language="javascript">alert("Connected to $dbname at $host successfully.");</script>';

    
    $consultasql= "SELECT `pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis` FROM `movies` WHERE `id_movie`='$id_movie'";

    if ($conn->query($consultasql) == TRUE) {
      //echo '<script language="javascript">alert("Se realiza la consulta");</script>';
      echo "<b> <center>Ficha de la película</center> </b> <br> <br>";
      //Creamos una tabla
      echo '<center><table border="0" cellspacing="10" cellpadding="10"> 
      <tr> 
         
        <td> <b><font face="Arial">Título</font> </b></td> 
        <td> <b><font face="Arial">Año de lanzamiento</font></b> </td> 
        <td> <b><font face="Arial">Minutos</font></b> </td> 
        <td> <b><font face="Arial">Categoria</font> </b></td> 
        <td> <b><font face="Arial">Sinopsis</font> </b></td> 
      </tr>';

    
      if ($resultado = $conn->query($consultasql)) {
          /* fetch associative array */
          while ($row = $resultado->fetch_assoc()) {
            $pic = $row["pic"];
            $titulo = $row["titulo"];
            $ano_lanzamiento = $row["ano_lanzamiento"];
            $minutos = $row["minutos"];
            $categoria = $row["categoria"];
            $sinopsis = $row["sinopsis"]; 
    
            echo '<svg width="150" height="300"><image href="'.$pic.'" width="150"  height="300"/></svg>
                <tr> 
                  <td>'.$titulo.'</td> 
                  <td>'.$ano_lanzamiento.'</td> 
                  <td>'.$minutos.'</td> 
                  <td>'.$categoria.'</td> 
                  <td>'.$sinopsis.'</td> 
              </tr>';
            }
        
        $resultado->free();
    

        
      }else{
        echo 'Error al mostrar los datos';
      }
            

      }else{
        echo '<script language="javascript">alert("Error al realizar la consulta");</script>';
        echo '<b>ERROR</b> <p>"No se ha podido realizar la consulta"</p>';

      }

    }     
      ?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>