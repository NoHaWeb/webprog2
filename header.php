<?php if(!isset($_SESSION['id']) || empty($_SESSION['id'])): ?>
    <a href="index.php?p=1">Bejelentkezés</a>
    <a href="index.php?p=2">Regisztráció</a>
    
    <?php else: ?>
    
        <a href="index.php?p=3">Könyvek</a>
        
        <?php if($_SESSION['auth'] == '1'): ?>        
            <a href="index.php?p=4">Új író</a>
            <a href="index.php?p=5">Új könyv</a>
        <?php else: ?>
            <a href="index.php?p=6">Kölcsönzéseim</a>
        <?php endif; ?>
            <a href="index.php?p=7">Profilom</a>
            <a href="index.php?p=8">Kijelentkezés</a>
    <?php endif; ?>