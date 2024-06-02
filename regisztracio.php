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
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        } else {
            $pdo = new PDO('mysql:host=localhost;dbname=web2', 'root', '',
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            $query = "SELECT * FROM felhasznalok WHERE felhasznalonev = :felhasznalo";
            $statement = $pdo->prepare($query);
            $statement->execute(array(':felhasznalo' => $felhasznalo));
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if($row) {
            echo "A felhasználónév már foglalt!<br>";
            echo "Vissza a regisztrációhoz: <a href='index.php?oldal=2'>Regisztráció</a>";
            die();
            }



            $query = "INSERT INTO felhasznalok (nev, felhasznalonev, jelszo, auth) VALUES (:nev, :felhasznalo, :jelszo, :auth)";
            $statement = $pdo->prepare($query);

            $jelszo = md5($jelszo);
            $statement->execute(
            array(
                ':nev' => $nev, 
                ':felhasznalo' => $felhasznalo, 
                ':jelszo' => $jelszo,
                ':auth' => $auth
            )
            );

            echo "Sikeres regisztráció! Az Ön azonosítója: " . $pdo->lastInsertId();
            echo "<br>";
            echo "Tovább a bejelentkezésre: <a href='index.php'>Bejelentkezés</a>";
        }
    }


?>