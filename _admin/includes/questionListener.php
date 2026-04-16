<?php
    function addIntoArvhive(){
        freezeQuestion($_GET['id']);
        $_SESSION['message'] = 'Вопрос добавлена в архив';
        header("Location: ".FOLDER."/_admin?item=questions");
    }

    function popOfArchive(){
        readdQuestion($_GET['id']);
        $_SESSION['message'] = 'Вопрос успешно восстановлен';
        header("Location: ".FOLDER."/_admin?item=questions");
    }

    function updateQuestions(){
        if(isset($_SESSION['id'])){unset($_SESSION['id']);}
        $_SESSION['message'] = 'Список вопросов успешно обновлен';
        header("Location: ".FOLDER."/_admin?item=questions");
    }

    function cancelAction(){
        unset($_SESSION['id']);
        header("Location: ".FOLDER."/_admin?item=questions");
    }

    function clearArchiveQuestions(){
        clearQuestions();
        header("Location: ".FOLDER."/_admin?item=questions");
    }

    function initOnSession(){
        $_SESSION['id'] = $_GET['id'];
    }

    if(isset($_GET['item']) && $_GET['item'] == 'questions'){
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "readd":
                    popOfArchive();
                    break;

                case "clear":
                    clearArchiveQuestions();
                    break;

                case "remove":
                    addIntoArvhive();
                    break;

                case "cancel":
                    cancelAction();
                    break;

                case "update":
                    updateQuestions();
                    break;

                case "edit":
                    initOnSession();
                    break;
            }
        }else if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            include 'includes/modalmessage.php';
            unset($_SESSION['message']);
        }
    }
?>
<script src = "js/emptymodal.js"></script>