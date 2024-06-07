<?php if(isset($_SESSION['id']) || !empty($_SESSION['id'])): ?>
    <?php switch ($_SESSION['auth']) {
        case '1':
            echo '<a href="index.php?p=3">Termékek</a>';
            echo '<a href="index.php?p=15">Kategóriák</a>';  
            echo '<a href="index.php?p=4">Eladások</a>';
            echo '<a href="index.php?p=5">Beszerzések</a>';
            echo '<a href="index.php?p=6">Visszatérítések</a>';
            echo '<a href="index.php?p=16">Raktárak</a>';
            echo '<a href="index.php?p=7">Raktárkészlet mozgás</a>';
            echo '<a href="index.php?p=8">Beszállítók</a>';
            echo '<a href="index.php?p=9">Ügyfelek</a>';
            echo '<a href="index.php?p=10">Alkalmazottak</a>';
            echo '<a href="index.php?p=11">Alkalmazotti tevékenységek</a>';
            break;
        case '2':
            echo '<a href="index.php?p=4">Eladások</a>';
            echo '<a href="index.php?p=5">Beszerzések</a>';
            break;
    }?>
<?php endif; ?>


    