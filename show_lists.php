<!--@author Alessandra-Marie Bayot Diana 
IDE: Visual Studio Code 1.79.0 -->
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel ="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Watchlist Netflix | Mostrar Listas</title>
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


<main>
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Todas las listas</h1>
      </div>
    </div>
  </section>

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
//echo '<script language="javascript">alert("Connected to $dbname at $host successfully.");</script>';

$consultasql= "SELECT movies.`id_movie`,movies.`pic`,movies.`titulo` FROM listas inner join usuarios on listas.`usuarios_id_usuario`=usuarios.id_usuario inner join movies on listas.`movies_id_movie`=movies.id_movie";

if ($conn->query($consultasql) == TRUE) {

  if ($resultado = $conn->query($consultasql)) {
      /* fetch associative array */
      while ($row = $resultado->fetch_assoc()) {
        $id_movie =$row["id_movie"];
        $pic =$row["pic"];
        $titulo = $row["titulo"];


        echo '<form method="POST" action="delete_list.php">
        <div class="col">
        <div class="card shadow-sm">
        <svg width="150" height="300"><image href="'.$pic.'" width="150"  height="300"/></svg>
        <input id="$id_movie" name="id_movie" type="hidden" value="'.$id_movie.'" />
          <div class="card-body">
            <p class="card-text">'.$titulo.'</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              <button type="submit" class="btn btn-sm btn-outline-secondary">Quitar de la lista</button>
              </div>
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


  ?>

      </main>


      <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
          <span class="text-body-secondary">author @ Alessandra-Marie Bayot Diana</span>
        </div>
      </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>