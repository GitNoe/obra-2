<?php
require '../../conexion/conexion.php';
require '../../conexion/sesion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM persoas WHERE id = '$id'";
$ficha = $mysqli->query($sql);
$row = $ficha->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Ficha</title>
  <link rel="stylesheet" href="../../assets/css/index.css">
  <script src="../../components/js/header2.js"></script>
  <script src="../../components/js/footer2.js"></script>
</head>

<body>

  <header-component></header-component>

  <main>
  <h5 class="p-2 success text-center">FICHA DE PERSOA CON ID <?php echo $row['id']; ?></h5>

  <div class="container">
    <p>Nome e Apelidos: <?php echo $row['nome'], "&nbsp", $row['primeiro_apelido'], "&nbsp", $row['segundo_apelido']; ?></p>
    <!-- <p>Nome: <?php echo $row['nome']; ?></p>
    <p>1º Apelido: <?php echo $row['primeiro_apelido']; ?></p>
    <p>2º Apelido: <?php echo $row['segundo_apelido']; ?></p> -->
    <p>DNI/NIF: <?php echo $row['nif']; ?></p>
    <p>Data de nacemento: <?php echo $row['data_nacemento']; ?></p>
    <p>Sexo: <?php echo $row['sexo']; ?></p>
    <p>Código Postal: <?php echo $row['codigo_postal']; ?></p>
    <p>Teléfono: <?php echo $row['telefono']; ?></p>
    <p>Email: <?php echo $row['email']; ?></p>
  </div>

  </main>

  <footer-component></footer-component>

</body>

</html>
