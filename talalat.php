<?php
if (isset($_GET['search']) && !empty($_GET['search'])): ?>
    <?php
    if (strpos($_GET['search'], '\'') !== false || strpos($_GET['search'], '%') !==false):?>
            <div class="alert alert-danger" role="alert">
    <h1>Illetéktelen behatoló!<p style="font-size:100px">&#128540;</p></h1>
    </div>
    <?php else: ?>
        <?php
        $search_term = $_GET['search'];
        $search_term = rtrim($search_term, '%');
        echo "A keresett kifejezés: <b>\"" . htmlspecialchars($search_term) . "\"</b><br>";

        require_once 'db_kapcsolat.php';
        require_once 'crud.php';

        $db = new Database();
        $crudManager = new CRUDManager($db);


        $sql = "SELECT termekek.termek_id,termekek.termek_nev, kategoriak.kategoria_nev FROM termek_kategoriak
         INNER JOIN termekek ON termekek.termek_id = termek_kategoriak.termek_id
         INNER JOIN kategoriak ON kategoriak.kategoria_id = termek_kategoriak.kategoria_id
         WHERE LOWER(termekek.termek_nev) LIKE LOWER('%$search_term%')";
        $results = $db->fall($sql);
    ?>
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
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td class="ps-3 pe-3"> <?php echo $row['termek_id'] ?></td>
                        <td class="ps-3 pe-3"><?php echo $row['termek_nev'] ?></td>
                        <td class="ps-3 pe-3"><?php echo $row['kategoria_nev'] ?></td>

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
<?php endif ?>
<?php else: ?>
    Nincs keresési kifejezés megadva
<?php endif ?>