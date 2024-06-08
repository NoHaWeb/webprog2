
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db_kapcsolat.php';
    require_once 'crud.php';

    $db = new Database();
    $crudManager = new CRUDManager($db);

    $termek_nev = $_POST['termek_nev'];
    $kategoria = $_POST['kategoria'];
    $id = $_POST['id'];

    $egyezo_termek = $crudManager->performCRUD("select", "termekek", "", "termek_nev = '$termek_nev'");

    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Session indítása, ha még nem indult el
    }
    if ($egyezo_termek) {
        $_SESSION['message_nok'] = "Ez a termék: '"."$termek_nev"."', már létezik!";
        header("Location: index.php?p=3");
        exit();
    } else {
        $data = ['termek_nev' => $termek_nev ];
        $crudManager->performCRUD("insert", "termekek", $data, "");

        $stmt = $db -> executeQuery('SELECT MAX(termek_id) AS latest_id FROM termekek');
        $row = $stmt->fetch();
        $latest_id = $row['latest_id'];

        $data = [
            'termek_id' => $latest_id,
            'kategoria_id' => $kategoria,
        ];
        $crudManager->performCRUD("insert", "termek_kategoriak", $data, "");
        // $kategoria_qry = "INSERT INTO termek_kategoriak SET termek_id = ?, kategoria_id = ?";
       
        $_SESSION['message_ok'] = "<span class='highlight'>".$termek_nev."</span> sikeresen felvéve a termékekhez.";
        header('Location: index.php?p=3');
        exit();
    }
}
$db->closeConnection();
?>