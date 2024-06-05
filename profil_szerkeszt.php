<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO('mysql:hostname=localhost;dbname=web2', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nev = $_POST['nev'];
    $felhasznalonev = $_POST['felhasznalonev'];
    $auth = $_POST['beosztas'];

    $query = "UPDATE felhasznalok SET nev = ?, felhasznalonev = ?, auth = ? WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$nev, $felhasznalonev, $auth, $_POST['id']]);
    session_start();
    $_SESSION['auth'] = $auth;
    session_write_close();
    echo "<script>alert('A módosítás sikeresen megtörtént!');</script>";
    header('Refresh: 0; url=index.php?p=12');
}
?>
