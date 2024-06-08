<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];

        // Input adatok
        $nev = trim($_POST["nev"]);
        $felhasznalo = trim($_POST["felhasznalo"]);
        $jelszo = trim($_POST["jelszo"]);
        $auth = trim($_POST["beosztas"]);

        // Üres mezők ellenőrzése
        if (empty($nev) || empty($felhasznalo) || empty($jelszo)) {
            $errors[] = "Minden mező kitöltése kötelező!";
        }

        // Név hosszának ellenőrzése
        if (strlen($nev) < 3 || strlen($nev) > 30) {
            $errors[] = "A név hossza 3 és 30 karakter közötti lehet!";
        }

        // Jelszó hosszának ellenőrzése
        if (strlen($jelszo) < 6) {
            $errors[] = "A jelszó hossza legalább 6 karakter kell legyen!";
        }

        // Jelszó kisbetű ellenőrzése
        if (!preg_match('/[a-z]/', $jelszo)) {
            $errors[] = "A jelszónak tartalmaznia kell legalább egy kisbetűt!";
        }

        // Jelszó nagybetű ellenőrzése
        if (!preg_match('/[A-Z]/', $jelszo)) {
            $errors[] = "A jelszónak tartalmaznia kell legalább egy nagybetűt!";
        }

        // Jelszó szám ellenőrzése
        if (!preg_match('/[0-9]/', $jelszo)) {
            $errors[] = "A jelszónak tartalmaznia kell legalább egy számot!";
        }

        // Hibák kiírása vagy sikeres üzenet
        if (!empty($errors)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start(); // Session indítása, ha még nem indult el
            }
            foreach ($errors as $error) {
                $_SESSION['message_nok'] = $error;
                header("Location: index.php?p=2");
            }
            exit();
        } else {
            require_once 'db_kapcsolat.php';
            require_once 'crud.php';
            $db = new Database();
            $crudManager = new CRUDManager($db);

            $nev = trim($_POST["nev"]);
            $felhasznalo = trim($_POST["felhasznalo"]);
            $jelszo = trim($_POST["jelszo"]);
            $auth = trim($_POST["beosztas"]);
            
            $row = $crudManager->performCRUD("select", "felhasznalok", "", "felhasznalonev = '$felhasznalo'");

            if($row) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start(); // Session indítása, ha még nem indult el
                }
                $_SESSION['message_nok'] = "A(z) ".$felhasznalo." felhasználónév már foglalt!";
                header("Location: index.php?p=2");
            die();
            }
           $jelszo = md5($jelszo);
           $data= [
                'nev' => $nev, 
                'felhasznalonev' => $felhasznalo, 
                'jelszo' => $jelszo,
                'auth' => $auth
           ];
            $crudManager->performCRUD("insert", "felhasznalok", $data, "");
            if (session_status() == PHP_SESSION_NONE) {
                session_start(); // Session indítása, ha még nem indult el
            }
            $_SESSION['message_ok'] = "A ".$felhasznalo." felhasználónév sikeresen létrehozva!";
            header("Location: index.php?p=1");
        }
    }


?>