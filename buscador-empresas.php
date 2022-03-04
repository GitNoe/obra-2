<?php
//Si se ha pulsado el botón de buscar
if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['keywords'];

    //Conectamos con la base de datos en la que vamos a buscar
    $conexion = mysqli_connect("localhost", "root", "Usqpj=Z$");
    mysqli_select_db("obra", $conexion);

    $query = "SELECT nome DATE_FORMAT(post_date, '%d-%m-%Y') as fecha
                FROM TABLA
                WHERE status = '1'
                AND (contenido LIKE '%" . $keywords . "%'
                OR titulo LIKE '%" . $keywords . "%')
                ORDER BY fecha desc";

    $query_searched = mysqli_query($query, $conexion);

    $count_results = mysqli_num_rows($query_searched);

    //Si ha resultados
    if ($count_results > 0) {

        echo '<h2>Se han encontrado '.$count_results.' resultados.</h2>';

        echo '<ul>';
        while ($row_searched = mysql_fetch_array($query_searched)) {
            //En este caso solo mostramos el titulo y fecha de la entrada
            echo '<li><a href="#">'.$row_searched['titulo'].' ('.$row_searched['fecha'].')</a></li>';
        }
        echo '</ul>';
    }
    else {
        //Si no hay registros encontrados
        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
    }
}
?>