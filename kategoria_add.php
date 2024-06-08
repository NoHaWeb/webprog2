<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kategoria_nev'])) {
    require_once 'db_kapcsolat.php';
    require_once 'crud.php';

    $db = new Database();
    $crudManager = new CRUDManager($db);
    $kategoria_nev = $_POST['kategoria_nev'];
    $kategoria_nev = rtrim($kategoria_nev);

    $result = $crudManager->performCRUD("select", "kategoriak", "", "kategoria_nev = '$kategoria_nev'");

    // $pdo = new PDO('mysql:hostname=localhost;dbname=web2', 'root', '');
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $csekk_qry = "SELECT * FROM kategoriak WHERE kategoria_nev = $kategoria_nev ";
    // $statement = $pdo->prepare($csekk_qry);

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
        // $kategoria_qry = "INSERT INTO kategoriak SET kategoria_nev = ?";
        // $statement = $pdo->prepare($kategoria_qry);
        // $statement->execute([$kategoria_nev]);

        $_SESSION['message_ok'] = $kategoria_nev." kategória sikeresen hozzáadva.";
        header('Location: index.php?p=15');
        exit();
    }
}