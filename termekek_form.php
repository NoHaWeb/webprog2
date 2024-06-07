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
 INNER JOIN kategoriak ON kategoriak.kategoria_id = termek_kategoriak.kategoria_id";
$termekek = $db->fall($sql);
$userid = $_SESSION['id'];
$kategoriak = $crudManager->performCRUD("select", "kategoriak", "", "");
?>
<h2>Új termék felvitele</h2>
<form action="termekek.php" method="POST">
    <table>
        <input type="hidden" name="id" value="<?php echo $userid ?>">
        <tr>
            <td>
                <label for="nev">Termék neve:</label>
            </td>
            <pre>
                <td>
                    <input type="text" name="nev" id="nev" required>                
                </td>
            </pre>
        </tr>
        <tr>
            <td>
                <label for="kategoria">Kategória: </label>
            </td>
            <pre>
                <td>

                <select name="kategoria" id="kategoria">
 -->                <?php foreach ($kategoriak as $kategoria): ?>
                                <option value="<?php echo $kategoria['kategoria_id']; ?>">
                                <?php echo $kategoria['kategoria_nev'] ?></option>
                    <?php endforeach; ?>
                </select>
                </td>
            </pre>
        </tr>
        <tr>
            <td>
                <input type="submit" value="JÓVÁHAGY">
            </td>
        </tr>
    </table>
</form>

<br>
<hr><br>
<h2>Új termék feltöltése</h2>
<form enctype="multipart/form-data" method="post" action="termek_feltoltes.php">
    <input type="file" name="file" accept=".csv">
    <input type="submit" name="submit" value="Feltöltés">
</form>

<br>
<hr><br>

<div>
    <table class="table table-sm table-info table-borderless" id="table" data-show-header="true" data-pagination="true"
        data-id-field="name" data-page-list="[5, 10, 25, 50, 100, ALL]" data-page-size="5">
        <thead>
            <tr>
                <th scope="col" class="ps-3">Termék #ID</th>
                <th scope="col" class="ps-3">Név</th>
                <th scope="col" class="ps-3">Kategória</th>
                <th scope="col" class="ps-3 danger">Törlés</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>

                <tr>
                    <td class="ps-3 pe-3"> <?php echo $row['termek_id'] ?></td>
                    <td class="ps-3 pe-3"><?php echo $row['termek_nev'] ?></td>
                    <?php
                    foreach ($termekek as $termek) {
                        if ($row['termek_id'] == $termek[0]) {
                            echo '<td class="ps-3 pe-3">' . $termek[1] . '</td>';
                        }
                    }
                    ?>
                    <td class="ps-3 pe-3 text-danger">
                        <form action="torles_termek.php" method="POST">
                            <input type="hidden" name="termek_id" value="<?php echo $row['termek_id'] ?>">
                            <input type="submit" value="Törlés">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <a onclick="prevPage()" href='#' id="btn_prev">Prev</a>
    <a onclick="nextPage()" href='#' id="btn_next">Next</a> -->
    <div class="pagination">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a onclick="prevPage()" class="page-link" id="btn_prev" href="#">Előző</a>
            </li>
            <li class="page-item">
                <a onclick="nextPage()" class="page-link" id="btn_next" href="#">Következő</a>
            </li>
        </ul>
    </div>
    <div class="container justify-content-center ms-5"><span>Page: </span><span id="page"></span></div>
</div>
<script src="elemek/pagination.js"></script>