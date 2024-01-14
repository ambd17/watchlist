<!doctype html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel ="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Watchlist Netflix | Filtrar películas </title>
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
<br><h1> <center>Todas las películas</center> </h1> <br>
<!--Agregamos una casilla para indicar el filtraje-->
<p>Filtrar por categoria</p>
<form method="POST" class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" >
<input type="input" name="category" id="category"  class="form-control" placeholder="Por favor indique la categoría: acción, terror, comedia...">
<button class="btn btn-primary w-100 py-2" type="submit">Buscar</button>
</form>


<!--código PHP-->
    <?php
    if($_POST){
    //Instanciamos las variables con los datos introducidos por el usuario
    $category = $_POST['category'];
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
    
    $consultasql= "SELECT `id_movie`,`pic`,`titulo`,`ano_lanzamiento`,`minutos`,`categoria`,`sinopsis` FROM `movies` WHERE `categoria`='$category'";

    if ($conn->query($consultasql) == TRUE) {    
      if ($resultado = $conn->query($consultasql)) {
          /* fetch associative array */
          while ($row = $resultado->fetch_assoc()) {
            $id_movie =$row["id_movie"];
            $pic =$row["pic"];
            $titulo = $row["titulo"];
            $ano_lanzamiento = $row["ano_lanzamiento"];
            $minutos = $row["minutos"];
            $categoria = $row["categoria"];
            $sinopsis = $row["sinopsis"]; 
    
            echo '<form method="POST" action="details_movie.php">
            <div class="col">
            <div class="card shadow-sm">
            <svg width="150" height="300"><image href="'.$pic.'" width="150"  height="300"/></svg>
            <input id="$id_movie" name="id_movie" type="hidden" value="'.$id_movie.'" />
              <div class="card-body">
                <p class="card-text">'.$titulo.'</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href=""><button class="btn btn-sm btn-outline-secondary">Ficha técnica</button></a>
                    <a href="add_list.php"><button name="id_movie" value="'.$id_movie.'" type="submit" class="btn btn-sm btn-outline-secondary">Agregar a mi Lista</button></a>
                  </div>
                  <small class="text-body-secondary">'.$categoria.'</small>
                </div>
              </div>
            </div>
          </div>
          </form>';
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
      //cierro la conexion

      ?>

      <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
          <span class="text-body-secondary">author @ Alessandra-Marie Bayot Diana</span>
        </div>
      </footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>