<?php
    require_once 'db_kapcsolat.php';
    require_once 'crud.php';

    $db = new Database();
    $crudManager = new CRUDManager($db);
    $kategoria_id = $_POST['kategoria_id'];
    
    $crudManager->performCRUD("delete", "kategoriak", "", "kategoria_id = '$kategoria_id'");

    header('Location: index.php?p=15');

?>