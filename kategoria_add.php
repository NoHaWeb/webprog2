<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kategoria_nev'])) {
    $pdo = new PDO('mysql:hostname=localhost;dbname=web2', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $kategoria_nev = $_POST['kategoria_nev'];

    $kategoria_qry = "INSERT INTO kategoriak SET kategoria_nev = ?";
    $statement = $pdo->prepare($kategoria_qry);
    $statement->execute([$kategoria_nev]);
    
    echo "A kategória sikeresen hozzáadva.";
    header('Location: index.php?p=15');
}