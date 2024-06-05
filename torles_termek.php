<?php
    $pdo = new PDO('mysql:host=localhost;dbname=web2', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "DELETE FROM termek_kategoriak WHERE termek_id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['termek_id']]);
    $query = "DELETE FROM termekek WHERE termek_id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['termek_id']]);

    header('Location: index.php?p=3');

?>