<?php
    require_once 'db_kapcsolat.php';
    $db = new Database();

    $felhasznalo = $_POST['felhasznalo'];
    $jelszo = $_POST['jelszo'];
    
    $query = "SELECT * FROM felhasznalok WHERE felhasznalonev = :felhasznalo AND jelszo = :jelszo";
    $params = array(
        ':felhasznalo' => $felhasznalo,
        ':jelszo' => md5($jelszo)
    );
    $statement = $db->executeQuery($query, $params);
    $row = $statement->fetch(PDO::FETCH_ASSOC);


    if ($row) {
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['auth'] = $row['auth'];
        header('Location: index.php');


    } else {
        echo "Hibás felhasználónév vagy jelszó!";
        echo "<br>";
        echo "Vissza a bejelentkezéshez: <a href='index.php?oldal=1'>Bejelentkezés</a>";
    }