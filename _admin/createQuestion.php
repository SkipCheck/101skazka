<?php
    include "includes/header.php";

    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $sql = "";
    
    if(isset($_SESSION['id'])){
        $sql = "UPDATE questions SET question = :question, answer = :answer WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute(['question' => $question, 'answer' => $answer, 'id' => $_SESSION['id']]);
    }else{
        $sql = "INSERT INTO questions (question, answer) VALUES (:question, :answer)";
        $query = $pdo->prepare($sql);
        $query->execute(['question' => $question, 'answer' => $answer]);
    }
    header('Location: '.FOLDER."/_admin/?item=questions&action=update");
?>