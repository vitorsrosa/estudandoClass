<?php

    include('Sql.php');

    $sql = new Sql();

    $dados = $sql->select("SELECT * FROM teste");

    echo json_encode($dados);

?>