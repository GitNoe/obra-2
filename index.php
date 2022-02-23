<?php
require 'conexion/conexion.php';
require 'conexion/sesion.php';
// este cacho de php tiene que ir SIEMPRE al inicio de los archivos de las páginas (a no ser que
// solo actúen como funciones y no haya front-end), y excepto aquí en el index deben ponerse los
// dos puntos y / antes del nombre de la carpeta (ver por ejemplo nuevo.php de persoas)
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OBRA 2 SOL</title>
  <!-- CND de bootstrap -> cambiar cuando toque -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="../components/js/header.js"></script>
  <script src="../components/js/footer.js"></script>
</head>

<body>

  <!-- header -->
  <header-component></header-component>

  <main style="margin-left: 10%;">
    <h1 style="color: red">Welcome to SOL</h1>
    <br><br>

    <a href="persoas/index.php">Index Persoas</a><br>
    <a href="persoas/functions/nuevo.php">Novo Rexistro Persoas</a>

    <br><br>

    <a href="empresas/index.php">Index Empresas</a><br>
    <a href="empresas/functions/nuevo.php">Novo Rexistro Empresas</a>

    <br><br>

    <a href="login/logout.php">Saír da sesión</a>
  </main>


  <!-- footer -->
  <footer-component></footer-component>
</body>

</html>

<!-- el código html de arriba es el del index que creamos con las dependencias + un h1 de prueba
y un enlace para salir (comprobar que funciona el logout) -->
