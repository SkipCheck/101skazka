<?php
    include "includes/header.php";

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $path = 'img/uploads/gallery/'.$image;
    move_uploaded_file($tmp_image, '../'.$path);
    
    var_dump($path);
    
    $sql = "INSERT INTO gallery (path) VALUES (:path)";
    $query = $pdo->prepare($sql);
    $query->execute(['path' => $path]);

    header('Location: '.FOLDER."/_admin/?item=gallery");
?>