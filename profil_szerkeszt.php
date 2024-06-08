<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Input adatok
    $nev = trim($_POST["nev"]);
    $felhasznalonev = trim($_POST["felhasznalonev"]);
    $auth = trim($_POST["beosztas"]);


    // Üres mezők ellenőrzése
    if (empty($nev) || empty($felhasznalonev)) {
        $errors[] = "Minden mező kitöltése kötelező!";
    }

    // Név hosszának ellenőrzése
    if (strlen($nev) < 3 || strlen($nev) > 30) {
        $errors[] = "A név hossza 3 és 30 karakter közötti lehet!";
    }
    if (strlen($felhasznalonev) < 3 || strlen($felhasznalonev) > 30) {
        $errors[] = "A felhasználó név hossza 3 és 30 karakter közötti lehet!";
    }


    // Hibák kiírása vagy sikeres üzenet
    if (!empty($errors)) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // Session indítása, ha még nem indult el
        }
        foreach ($errors as $error) {
            $_SESSION['message_nok'] = $error;
            header("Location: index.php?p=12");
        }
        exit();
    } else {
        require_once 'db_kapcsolat.php';
        require_once 'crud.php';

        $db = new Database();
        $crudManager = new CRUDManager($db);

        $nev = trim($_POST["nev"]);
        $felhasznalonev = trim($_POST["felhasznalonev"]);
        $auth = trim($_POST["beosztas"]);
        $member_id = $_POST['id'];

        $row = $crudManager->performCRUD("select", "felhasznalok", "", "felhasznalonev = '$felhasznalonev' AND NOT id ='$member_id' ");
        if($row) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start(); // Session indítása, ha még nem indult el
            }
            $_SESSION['message_nok'] = "A ".$felhasznalonev." felhasználónév már foglalt!";
           header("Location: index.php?p=12");
        die();
        }

        $data = [
            'nev' => $nev,
            'felhasznalonev' => $felhasznalonev,
            'auth' => $auth
        ];
        $results = $crudManager->performCRUD("update", "felhasznalok", $data, "id = '$member_id'");

        // $query = "UPDATE felhasznalok SET nev = ?, felhasznalonev = ?, auth = ? WHERE id = ?";
        // $statement = $pdo->prepare($query);
        // $statement->execute([$nev, $felhasznalonev, $auth, $_POST['id']]);

        session_start();
        $_SESSION['auth'] = $auth;
        session_write_close();
        // echo "<script>alert('A módosítás sikeresen megtörtént!');</script>";
        // header('Refresh: 0; url=index.php?p=12');
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // Session indítása, ha még nem indult el
        }
        $_SESSION['message_ok'] = "A módosítás sikeresen megtörtént.";
        header('Location: index.php?p=12');
        exit();
         }
    }

?>