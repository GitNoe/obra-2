<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

// METODO DE BÚSQUEDA ANTERIOR - NO FUNCIONA BIEN CON LA PAGINACIÓN ASÍ QUE SE MANDA A OTRA PÁGINA
// $where = "";

// if (!empty($_POST)) {
//   $valor = $_POST['campo'];
//   if (!empty($valor)) {
//     $where = "WHERE nome LIKE '%" . $valor . "%'";
//   }
// }
// $sql = "SELECT * FROM empresas $where";
// $consulta = $mysqli->query($sql);


// PAGINACION - SE CARGA LA BÚSQUEDA

// Get the total number of records from our table "EMPRESAS".
$total_pages = $mysqli->query('SELECT COUNT(*) FROM empresas')->fetch_row()[0];
// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM empresas ORDER BY id LIMIT ?,?')) {
  // Calculate the page to get the results we need from our table.
  $calc_page = ($page - 1) * $num_results_on_page;
  $stmt->bind_param('ii', $calc_page, $num_results_on_page);
  $stmt->execute();
  // Get the results...
  $result = $stmt->get_result();
  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="gl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Página principal de empresas, tabla de datos y enlaces a funciones">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <link rel="stylesheet" href="../assets/css/index.css">
  <script src="../components/js/header2.js"></script>
  <script src="../components/js/footer2.js"></script>
  <title>Empresas</title>
</head>

<body>

  <!-- header -->
  <header-component></header-component>

  <!-- MAIN -->
  <div class="container">

    <div class="row"></div>
    <div class="row"></div>

    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <h5>EMPRESAS</h5>

        <form class="d-flex" action="./busqueda.php" method="POST">

          <a href="functions/nuevo.php" class="btn btn-outline-success mb-3 personita">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
              <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
              <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
            </svg>
          </a>

          <div class="input-group mb-3 w-6">
            <input id="campo" name="campo" class="form-control me-2 ml-1" type="text" placeholder="Búsqueda por Nome" aria-label="Search">
            <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-outline-success">
          </div>

        </form>
      </div>
    </nav>

    <hr>

    <div class="row table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="col-sm-1">ID</th>
            <th class="col-sm-2">Nome</th>
            <th class="col-sm-2">Poboación</th>
            <th class="col-sm-2">Actividade</th>
            <th class="col-sm-2">Incorporación</th>
            <th class="col-sm-2">Tlf.</th>
            <th class="col-sm-2">Fax</th>
            <th class="col-sm-2">Accións</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['nome']; ?></td>
              <td><?php echo $row['poboacion']; ?></td>
              <td><?php echo $row['actividade']; ?></td>
              <td><?php echo $row['data_incorporacion']; ?></td>
              <td><?php echo $row['telefono']; ?></td>
              <td><?php echo $row['fax']; ?></td>
              <!-- <td><?php echo $row['ofertas_contratacion']; ?></td> -->
              <!-- <td><?php echo $row['ofertas_formacion']; ?></td> -->
              <td>
                <a class="red-icons" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                  </svg></a>
                <a class="red-icons" href="functions/modificar.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                  </svg></a>
                <a class="red-icons" href="functions/eliminar.php?id=<?php echo $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                  </svg></a>
              </td>
            </tr>
          <?php endwhile; ?>

        </tbody>
      </table>
    </div>

    <!-- FUNCIÓN DE PAGINACIÓN CON ESTILOS -->
    <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
      <ul class="pagination">
        <?php if ($page > 1) : ?>
          <li class="prev"><a href="index.php?page=<?php echo $page - 1 ?>">Prev</a></li>
        <?php endif; ?>

        <?php if ($page > 3) : ?>
          <li class="start"><a href="index.php?page=1">1</a></li>
          <li class="dots">...</li>
        <?php endif; ?>

        <?php if ($page - 2 > 0) : ?><li class="page"><a href="index.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
        <?php if ($page - 1 > 0) : ?><li class="page"><a href="index.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

        <li class="currentpage"><a href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

        <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="index.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
        <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="index.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
          <li class="dots">...</li>
          <li class="end"><a href="index.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
        <?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
          <li class="next"><a href="index.php?page=<?php echo $page + 1 ?>">Next</a></li>
        <?php endif; ?>
      </ul>
    <?php endif; ?>

  </div>

  <!-- footer -->
  <footer-component></footer-component>
</body>

</html>
