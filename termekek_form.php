<?php
require_once 'db_kapcsolat.php';
require_once 'crud.php';

$db = new Database();
$crudManager = new CRUDManager($db);
$result = $crudManager->performCRUD("select", "termekek", "", "");

$sql = "SELECT termekek.termek_id, kategoriak.kategoria_nev FROM termek_kategoriak
 INNER JOIN termekek ON termekek.termek_id = termek_kategoriak.termek_id
 INNER JOIN kategoriak ON kategoriak.kategoria_id = termek_kategoriak.kategoria_id";
$termekek = $db->fall($sql);
$userid = $_SESSION['id'];
$kategoriak = $crudManager->performCRUD("select", "kategoriak", "", "");
?>
<div class="container text-center">
    <div class="row justify-content-around">
        <div class="col-6 kistabla">
            <h3>Új termék felvitele</h3>
            <form action="termekek.php" method="POST">
                <div class="m-1">
                    <input type="hidden" name="id" value="<?php echo $userid ?>">

                    <label class="form-label" for="termek_nev">Termék neve:</label>
                    <input type="text" class="form-control" name="termek_nev" id="termek_nev" style="max-width: 100%" required>

                    <label class="form-label" for="kategoria">Kategória: </label>
                    <select class="form-select" name="kategoria" id="kategoria">
                        --> <?php foreach ($kategoriak as $kategoria): ?>
                            <option value="<?php echo $kategoria['kategoria_id']; ?>">
                                <?php echo $kategoria['kategoria_nev'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <hr>
                    <input type="submit" class="p-2" value="JÓVÁHAGY">

                </div>
            </form>
            <?php require_once 'uzenet.php'?>
        </div>
        <div class="col-6 kistabla">
            <h4 class="">Új termék feltöltése</h4><br>
            <form class="row" enctype="multipart/form-data" method="post" action="termek_feltoltes.php">
                <input type="file" name="file" accept=".csv"><br><br>
                <input type="submit" name="submit" value="FELTÖLTÉS">
            </form>
            <hr>
            <h4 class="">Termékek letöltése</h4><br>
            <form class="row" method="post" action="termek_letoltes.php">

                <input type="submit" name="submit" value="LETÖLTÉS">
            </form>
        </div>
    </div>
</div>
<br>
<div class="kistabla text-center" id="tablediv">
    <table class="table table-info table-borderless" id="table" data-show-header="true" data-pagination="true"
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