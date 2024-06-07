<?php if (isset($_SESSION['id']) || !empty($_SESSION['id'])): ?>
    <?php switch ($_SESSION['auth']) {
        case '1':
            echo '<a href="index.php?p=3"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Termékek</span>';
            echo '<a href="index.php?p=15"><img src="elemek/ikonok/lista.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Kategóriák</span>';
            echo '<a href="index.php?p=4"><img src="elemek/ikonok/merleg.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Eladások</span>';
            echo '<a href="index.php?p=5"><img src="elemek/ikonok/alak_scan.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszerzések</span>';
            echo '<a href="index.php?p=6"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Visszatérítések</span>';
            echo '<a href="index.php?p=16"><img src="elemek/ikonok/raktar_kivul.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Raktárak</span>';
            echo '<a href="index.php?p=7"><img src="elemek/ikonok/targonca_vezeto.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Raktárkészlet mozgás</span>';
            echo '<a href="index.php?p=8"><img src="elemek/ikonok/kamion.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszállítók</span>';
            echo '<a href="index.php?p=9"><img src="elemek/ikonok/alak_aruval.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Ügyfelek</span>';
            echo '<a href="index.php?p=10"><img src="elemek/ikonok/dispecser.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Alkalmazottak</span>';
            echo '<a href="index.php?p=11"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Alkalmazotti tevékenységek</span>';
            break;
        case '2':
            echo '<a href="index.php?p=4"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Eladások</span>';
            echo '<a href="index.php?p=5"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszerzések</span>';
            break;
        case '3':
            echo '<a href="index.php?p=9"><img src="elemek/ikonok/alak_aruval.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Ügyfelek</span>';
            echo '<a href="index.php?p=10"><img src="elemek/ikonok/dispecser.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Alkalmazottak</span>';
            echo '<a href="index.php?p=11"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Alkalmazotti tevékenységek</span>';
            break;
        case '4':
            echo '<a href="index.php?p=3"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Termékek</span>';
            echo '<a href="index.php?p=15"><img src="elemek/ikonok/lista.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Kategóriák</span>';
            echo '<a href="index.php?p=4"><img src="elemek/ikonok/merleg.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Eladások</span>';
            echo '<a href="index.php?p=5"><img src="elemek/ikonok/alak_scan.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszerzések</span>';
            echo '<a href="index.php?p=6"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Visszatérítések</span>';
            echo '<a href="index.php?p=8"><img src="elemek/ikonok/kamion.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszállítók</span>';
            echo '<a href="index.php?p=9"><img src="elemek/ikonok/alak_aruval.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Ügyfelek</span>';
            break;
        case '5':
            echo '<a href="index.php?p=3"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Termékek</span>';
            echo '<a href="index.php?p=15"><img src="elemek/ikonok/lista.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Kategóriák</span>';
            echo '<a href="index.php?p=4"><img src="elemek/ikonok/merleg.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Eladások</span>';
            echo '<a href="index.php?p=5"><img src="elemek/ikonok/alak_scan.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszerzések</span>';
            echo '<a href="index.php?p=6"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Visszatérítések</span>';
            echo '<a href="index.php?p=16"><img src="elemek/ikonok/raktar_kivul.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Raktárak</span>';
            echo '<a href="index.php?p=7"><img src="elemek/ikonok/targonca_vezeto.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Raktárkészlet mozgás</span>';
            echo '<a href="index.php?p=8"><img src="elemek/ikonok/kamion.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszállítók</span>';
            break;
        case '6':
            echo '<a href="index.php?p=3"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Termékek</span>';
            echo '<a href="index.php?p=15"><img src="elemek/ikonok/lista.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Kategóriák</span>';
            echo '<a href="index.php?p=4"><img src="elemek/ikonok/merleg.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Eladások</span>';
            echo '<a href="index.php?p=5"><img src="elemek/ikonok/alak_scan.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszerzések</span>';
            echo '<a href="index.php?p=6"><img src="elemek/ikonok/tarolo.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Visszatérítések</span>';
            echo '<a href="index.php?p=8"><img src="elemek/ikonok/kamion.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Beszállítók</span>';
            echo '<a href="index.php?p=9"><img src="elemek/ikonok/alak_aruval.png" alt="tarolo" style="width:150px;height:150px;"><span class="megnevezes">Ügyfelek</span>';
            break;
    } ?>
<?php endif; ?>