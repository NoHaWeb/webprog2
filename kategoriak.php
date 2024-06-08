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
    <div class="row justify-content-evenly">
        <div class="col-6 kistabla">
            <h1>Új kategória felvitele</h1>
            <form action="kategoria_add.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $userid ?>">

                <label for="kategoria_nev">Kategória neve:</label>
                <input type="text" name="kategoria_nev" id="kategoria_nev" required>

                <input type="submit" value="JÓVÁHAGY">
            </form>
        </div>
    </div>
    <?php require_once 'uzenet.php'?>
</div>
<br>
<div class="kistabla" id="tablediv">
    <table id="table" class="table table-success table-borderless border-primary justify-content-center">
        <thead>
            <tr>
                <th scope="col" class="ps-1">kategoria #ID</th>
                <th scope="col" class="ps-1">Kategória</th>
                <th scope="col" class="ps-1 danger">Törlés</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($kategoriak as $kategoria): ?>

                <tr>
                    <td class="ps-2 pe-2 pb-0"> <?php echo $kategoria['kategoria_id'] ?></td>
                    <td class="ps-2 pe-2 pb-0"><?php echo $kategoria['kategoria_nev'] ?></td>
                    <td class="ps-2 pe-2 text-danger pb-0">
                        <form action="torles_kategoriak.php" method="POST">
                            <input type="hidden" name="kategoria_id" value="<?php echo $kategoria['kategoria_id'] ?>">
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