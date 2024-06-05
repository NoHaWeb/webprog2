
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO('mysql:hostname=localhost;dbname=web2', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nev = $_POST['nev'];
    $kategoria = $_POST['kategoria'];
    $id = $_POST['id'];

    $termek_qry = "INSERT INTO termekek SET termek_nev = ?";
    $statement = $pdo->prepare($termek_qry);
    $statement->execute([$nev]);

    $stmt = $pdo->query('SELECT MAX(termek_id) AS latest_id FROM termekek');
    $row = $stmt->fetch();
    $latest_id = $row['latest_id'];

    $kategoria_qry = "INSERT INTO termek_kategoriak SET termek_id = ?, kategoria_id = ?";
    $statement = $pdo->prepare($kategoria_qry);
    $statement->execute([$latest_id, $kategoria]);
    header('Location:index.php?p=3');
}
?>