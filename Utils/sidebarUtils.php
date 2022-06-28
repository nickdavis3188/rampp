<?php

    if($_SESSION['privilege']=="Admin"){
        $nav = "../partials/_adminnav.php";
    }elseif ($_SESSION['privilege']=="Managing Director") {
        $nav = "../partials/_mdnav.php";
    }elseif ($_SESSION['privilege']=="Manager") {
        $nav = "../partials/_managernav.php";
    }elseif ($_SESSION['privilege']=="Supervisor") {
        $nav = "../partials/_supervisornav.php";
    }elseif ($_SESSION['privilege']=="Staff") {
        $nav = "../partials/_staffnav.php";
    }
?>