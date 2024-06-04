<?php if (!isset($_SESSION['id']) || empty($_SESSION['id'])): ?>
    <a href="index.php?p=1">Bejelentkezés</a>
    <a href="index.php?p=2">Regisztráció</a>
<?php else: ?>
    <a href="index.php?p=12">Profilom</a>
    <a href="index.php?p=13">Kijelentkezés</a>
<?php endif; ?>