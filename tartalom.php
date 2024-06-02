<?php
// echo ("Tartalom auth kódja: ");
// echo ($_SESSION['auth']);
// echo ("<br>");

if ((!isset($_SESSION['auth']) && empty($_GET['p']))) {
    //echo ($_GET['p'])    ;
    $p = 1;
}

else if ((!isset($_SESSION['id']) && !empty($_GET['p'])))  {
    if ($_GET['p'] == 2) {
        $p = 2;
    } else if (empty($_GET['p'])) {
        $p = 1;
    } else {
        $p = 1;
    }
}

if (isset($_SESSION['id'])) {

    if (empty($_GET['p'])) {
        $p = 3;
    }
    if (isset($_GET['p']) && !empty($_GET['p'])) {
        if ($_GET['p'] > 9) {
            $p = 8;
        } else {
            $p = $_GET['p'];
        }
    }
}

include 'pages.php';

include constant($p);

?>