<?php
    include "includes/header.php";

    $name = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $units = $_POST['units'];
    $minages = $_POST['minages'];
    $maxages= $_POST['maxages'];
    $selectedCategory = $_POST['selectedCategory'];
    
    if(!isset($_SESSION['id'])){
        $sql = "INSERT INTO services (title, description, minages, maxages, units, price, id_category) VALUES (:title, :description, :minages, :maxages, :units, :price, :id_category)";
        $query = $pdo->prepare($sql);
        $query->execute(['title' => $name, 'description' => $description, 'minages' => $minages, 'maxages' => $maxages, 'units' => $units, 'price' => $price, 'id_category' => $selectedCategory]);
    }else{
        $sql = "UPDATE services SET title = :title, description = :description, minages = :minages, maxages = :maxages, units = :units, price = :price, id_category = :id_category WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute(['title' => $name, 'description' => $description, 'minages' => $minages, 'maxages' => $maxages, 'units' => $units, 'price' => $price, 'id_category' => $selectedCategory, "id" => $_SESSION['id']]);
    }
    $currentId =(isset($_SESSION['id']) ? $_SESSION['id'] : $pdo->lastInsertId());

    foreach($_FILES as $array){
        $image = $array['name'];
        $tmp_image = $array['tmp_name'];
        $path = 'img/uploads/servicegallery/'.$image;
        move_uploaded_file($tmp_image, '../'.$path);

        $sql = "INSERT INTO servicegallery (id_service, image) VALUES (:id_service, :path)";
        $queryGallery = $pdo->prepare($sql);
        $queryGallery->execute(['id_service' => $currentId, 'path' => $path]);
    }

    header('Location: '.FOLDER."/_admin/?item=services&action=update");
?>