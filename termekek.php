<?php
require_once 'db_kapcsolat.php';
require_once 'crud.php';

$db = new Database();
$crudManager = new CRUDManager($db);

// Példa insert művelet
// $data = array("name" => "John", "age" => 30);
// $crudManager->performCRUD("insert", "users", $data);

// Példa select művelet
$result = $crudManager->performCRUD("select", "termekek", "", "");

$sql = "SELECT termekek.termek_id, kategoriak.kategoria_nev FROM termek_kategoriak
 INNER JOIN termekek ON termekek.termek_id = termek_kategoriak.termek_id
 INNER JOIN kategoriak ON kategoriak.kategoria_id = termek_kategoriak.kategoria_id
 ";
$termekek = $db->fall($sql);

?>
<div class="table table-lg table-info table-bordered border-primary">
    <table>
        <thead>
            <tr>
                <th scope="col" class="ps-3">Sorszám</th>
                <th scope="col" class="ps-3">Név</th>
                <th scope="col" class="ps-3">Kategória</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>

                <tr>
                    <td class="ps-3 pe-3"> <?php echo $row['termek_id'] ?></td>
                    <td class="ps-3 pe-3"><?php echo $row['termek_nev'] ?></td>
                    <?php
                    foreach ($termekek as $termek){
                        if ($row['termek_id'] == $termek[0]) {
                            echo'<td class="ps-3 pe-3">'. $termek[1].'</td>';
                        }
                    }
                    ?>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>