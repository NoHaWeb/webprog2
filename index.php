<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISKERESKEDELEM</title>
    <script type="text/javascript" src="elemek/js/bootstrap.js"></script>
    <script src=""></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="elemek/css/bootstrap.css">
    <link rel="stylesheet" href="elemek/style.css">
</head>

<body>
    <div class="container body">
        <?php session_start(); ?>
        <header class="bg-warning">
            <?php require_once 'logmenu.php'; ?>
        </header>
        <main>
            <div class="container text-center">
                <div class="row justify-content-evenly">
                    <div class="col-6">
                        <?php require_once 'tartalom.php'; ?>
                    </div>
                    <div class="col-6 kistabla">
                        <div class="d-flex flex-wrap align-items-center justify-content-evenly">
                            <?php require_once 'navmenu.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>