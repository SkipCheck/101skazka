<?php
    include "includes/header.php";

    $title = $_POST['title'];
    $description = $_POST['description'];
    $btntext = $_POST['btntext'];
    $one = $_POST['ratone'];
    $two = $_POST['rattwo'];

    $image = $_FILES['logoimg']['name'];
    $tmp_image = $_FILES['logoimg']['tmp_name'];
    $pathLogo = 'img/'.$image;
    move_uploaded_file($tmp_image, '../'.$pathLogo);

    $bg = $_FILES['bgimg']['name'];
    $tmp_bg = $_FILES['bgimg']['tmp_name'];
    $pathBackground = 'img/'.$bg;
    move_uploaded_file($tmp_bg, '../'.$pathBackground);

    $sql = "";

    if(empty($image)){
        $pathLogo = $_SESSION['prevLogo'];
    }

    if(empty($bg)){
        $pathBackground = $_SESSION['prevBackground'];
    }
    
    if(isset($_SESSION['id'])){
        $sql = "UPDATE infopage SET logo = :logo, title = :title, description = :description, button = :button, background = :background, first = :first, second = :second WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute(['logo' => $pathLogo, 'title' => $title, 'description' => $description, 'button' => $btntext, 'background' => $pathBackground, 'first' => $one, 'second' => $two, 'id' => $_SESSION['id']]);
    }
    header('Location: '.FOLDER."/_admin/?item=infopage&action=update");
?>