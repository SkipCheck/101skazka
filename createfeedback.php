<?php
    include "includes/header.php";
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $description = (isset($_POST['description']) ? $_POST['description'] : "");
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO feedback (name, phone, description, date) VALUES (:name, :phone, :description, :date)";
    $query = $pdo->prepare($sql);
    $query->execute(['name' => $name, "phone" => $phone, "description" => $description, "date" => $date]);
    $_SESSION['success'] = 1;
    header("Location: ".$_SERVER['HTTP_REFERER']);
?>