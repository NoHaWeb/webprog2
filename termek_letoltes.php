<?php
require_once 'db_kapcsolat.php';
require_once 'crud.php';

$db = new Database();
$crudManager = new CRUDManager($db);

$sql = "SELECT termekek.termek_id,termekek.termek_nev, kategoriak.kategoria_nev FROM termek_kategoriak
 INNER JOIN termekek ON termekek.termek_id = termek_kategoriak.termek_id
 INNER JOIN kategoriak ON kategoriak.kategoria_id = termek_kategoriak.kategoria_id";
$termekek = $db->executeQuery($sql);

$filename = 'adatok.csv';

header('Content-Encoding: UTF-8');
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// BOM (Byte Order Mark) hozzáadása a UTF-8 kódoláshoz
echo "\xEF\xBB\xBF";

// Fájl írása a kimenetre
$output = fopen('php://output', 'w');
while ($row = $termekek->fetch(PDO::FETCH_ASSOC)) {
    // A karakterkódolás konverziója UTF-8-ra
    foreach ($row as $key => $value) {
        $row[$key] = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
    fputcsv($output, $row);
}
fclose($output);

$db->closeConnection();
?>