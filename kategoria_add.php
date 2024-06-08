<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kategoria_nev'])) {
    require_once 'db_kapcsolat.php';
    require_once 'crud.php';

    $db = new Database();
    $crudManager = new CRUDManager($db);
    $kategoria_nev = $_POST['kategoria_nev'];
    $kategoria_nev = rtrim($kategoria_nev);

    $result = $crudManager->performCRUD("select", "kategoriak", "", "kategoria_nev = '$kategoria_nev'");

    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Session indítása, ha még nem indult el
    }
    if ($result) {
        $_SESSION['message_nok'] = "Ez a kategória: '"."$kategoria_nev"."', már létezik!";
        header("Location: index.php?p=15");
        exit();
    } else {
        $data = ['kategoria_nev' => $kategoria_nev ];
        $crudManager->performCRUD("insert", "kategoriak", $data, "");

        $_SESSION['message_ok'] = $kategoria_nev." kategória sikeresen hozzáadva.";
        header('Location: index.php?p=15');
        exit();
    }
}