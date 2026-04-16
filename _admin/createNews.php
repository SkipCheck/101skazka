<?php
    include "includes/header.php";

    $name = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $path = 'img/uploads/news/'.$image;
    move_uploaded_file($tmp_image, '../'.$path);

    $sql = "";

    if(empty($image)){
        $path = $_SESSION['prevImage'];
    }
    
    if(isset($_SESSION['id'])){
        $sql = "UPDATE news SET name = :name, description = :description, date = :date, preview = :preview WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute(['name' => $name, 'description' => $description, 'date' => $date, 'preview' => $path, 'id' => $_SESSION['id']]);
    }else{
        $sql = "INSERT INTO news (name, description, date, preview) VALUES (:name, :description, :date, :preview)";
        $query = $pdo->prepare($sql);
        $query->execute(['name' => $name, 'description' => $description, 'date' => $date, 'preview' => $path]);
    }

    header('Location: '.FOLDER."/_admin/?item=news&action=update");
?>