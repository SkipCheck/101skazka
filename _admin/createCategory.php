<?php
    include "includes/header.php";

    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $path = 'img/uploads/categories/'.$image;
    move_uploaded_file($tmp_image, '../'.$path);

    $sql = "";

    if(empty($image)){
        $path = $_SESSION['prevImage'];
    }
    
    if(isset($_SESSION['id'])){
        $sql = "UPDATE categories SET name = :name, image = :image WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute(['name' => $name, 'image' => $path, 'id' => $_SESSION['id']]);
    }else{
        $sql = "INSERT INTO categories (name, image) VALUES (:name, :image)";
        $query = $pdo->prepare($sql);
        $query->execute(['name' => $name, 'image' => $path]);
    }

    header('Location: '.FOLDER."/_admin/?item=categories&action=update");
?>