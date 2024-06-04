<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISKERESKEDELEM</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php session_start(); ?>
    <header>
    <nav id="sidebarLeft" class="sidebar bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <?php require_once 'logmenu.php'; ?>
            </div>
        </div>
    </nav>
    <nav id="sidebarRight" class="sidebar bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <?php require_once 'navmenu.php'; ?>
            </div>
        </div>
    </nav>
    </header>
    <main>
        <div class="container pt-4">
            <?php require_once 'tartalom.php'; ?>
        </div>
    </main>
</body>

</html>
