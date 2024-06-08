<?php
    require_once 'db_kapcsolat.php';
    require_once 'crud.php';

    $db = new Database();
    $crudManager = new CRUDManager($db);
    $termek_id = $_POST['termek_id'];
    
    $crudManager->performCRUD("delete", "termek_kategoriak", "", "termek_id = '$termek_id'");
    $crudManager->performCRUD("delete", "termekek", "", "termek_id = '$termek_id'");

    header('Location: index.php?p=3');

?>