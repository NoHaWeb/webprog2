<?php
$servername = "localhost";
$username = "root"; // Az adatbázis felhasználóneve
$password = ""; // Az adatbázis jelszava
$dbname = "web2"; // Az adatbázis neve

try {
    // Kapcsolódás az adatbázishoz PDO-val
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Kapcsolódási hiba esetén kivétel dobása
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // CSV fájl feltöltése
    if (isset($_POST["submit"])) {
        $file = $_FILES["file"]["tmp_name"];
        $handle = fopen($file, "r");

        if ($handle) {
            // Olvasd be az első sort (fejléc)
            $header = fgetcsv($handle, 10000, ",");
            $header = array_map("utf8_encode", $header);

            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                $data = array_map("utf8_encode", $data);
                $termek_nev = $data[0];
                $kategoria_nev = $data[1];

                // Ellenőrizd, hogy az adott termék és kategória már szerepel-e az adatbázisban
                $stmt = $conn->prepare("SELECT termek_id FROM termekek WHERE termek_nev COLLATE utf8mb4_general_ci = :termek_nev");
                $stmt->execute(['termek_nev' => $termek_nev]);

                if ($stmt->rowCount() > 0) {
                    echo "A(z) ".$termek_nev." termék már szerepel az adatbázisban.<br>";
                } else {
                // Ellenőrizd, hogy a kategória létezik-e, ha nem, akkor szúrd be
                    $stmt = $conn->prepare("SELECT kategoria_id FROM kategoriak WHERE kategoria_nev COLLATE utf8mb4_general_ci = :kategoria_nev");
                    $stmt->execute(['kategoria_nev' => $kategoria_nev]);

                    if ($stmt->rowCount() > 0) {
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $kategoria_id = $row["kategoria_id"];
                    } else {
                        $stmt = $conn->prepare("INSERT INTO kategoriak (kategoria_nev) VALUES (:kategoria_nev)");
                        $stmt->execute(['kategoria_nev' => $kategoria_nev]);
                        $kategoria_id = $conn->lastInsertId();
                    }

                    // Szúrd be a terméket
                    $stmt = $conn->prepare("INSERT INTO termekek (termek_nev) VALUES (:termek_nev)");
                    $stmt->execute(['termek_nev' => $termek_nev]);
                    $termek_id = $conn->lastInsertId();

                    // Szúrd be a kapcsolatot a termek_kategoriak táblába
                    $stmt = $conn->prepare("INSERT INTO termek_kategoriak (termek_id, kategoria_id) VALUES (:termek_id, :kategoria_id)");
                    $stmt->execute(['termek_id' => $termek_id, 'kategoria_id' => $kategoria_id]);
                }



            }

            fclose($handle);
            echo "Az adatok sikeresen feltöltve.";
        } else {
            echo "Hiba a fájl megnyitása során.";
        }
    }
} catch(PDOException $e) {
    echo "Hiba: " . $e->getMessage();
}

$conn = null;
//header('Location: index.php?p=3');
?>
