<?php

    if($_SESSION['privilege']=="Admin"){
        $nav = "../partials/_adminnav.php";
    }elseif ($_SESSION['privilege']=="Managing Director") {
        $nav = "../partials/_mdnav.php";
    }elseif ($_SESSION['privilege']=="Manager") {
        $nav = "../partials/_managernav.php";
    }elseif ($_SESSION['privilege']=="Supervisor") {
        $nav = "../partials/_supervisornav.php";
    }elseif ($_SESSION['privilege']=="Accountant") {
        $nav = "../partials/_accountantnav.php";
    }elseif ($_SESSION['privilege']=="SelsePerson") {
        $nav = "../partials/_salespersonnav.php";
    }elseif ($_SESSION['privilege']=="Bar") {
        $nav = "../partials/_barnav.php";
    }elseif ($_SESSION['privilege']=="Kitchen") {
        $nav = "../partials/_kitchennav.php";
    }
?>