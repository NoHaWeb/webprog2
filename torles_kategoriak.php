<?php
    $pdo = new PDO('mysql:host=localhost;dbname=web2', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "DELETE FROM kategoriak WHERE kategoria_id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['kategoria_id']]);


    header('Location: index.php?p=15');

?>