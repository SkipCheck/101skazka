<?php
    include "includes/header.php";
    session_destroy();
    unset($_SESSION);
    header("Location: ".FOLDER."/_admin");
?>