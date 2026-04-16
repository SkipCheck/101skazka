<?php
    function addIntoArvhive(){
        freezeCategory($_GET['id']);
        $_SESSION['message'] = 'Категория '.get_categoryID($_GET['id'])['name'].' добавлена в архив';
        header("Location: ".FOLDER."/_admin?item=categories");
    }

    function popOfArchive(){
        readdCategory($_GET['id']);
        $_SESSION['message'] = 'Категория '.get_categoryID($_GET['id'])['name'].' успешно восстановлена';
        header("Location: ".FOLDER."/_admin?item=categories");
    }

    function updateCategories(){
        if(isset($_SESSION['id'])){ 
            unset($_SESSION['id']);
            unset($_SESSION['prevImage']);
        }
        $_SESSION['message'] = 'Список категорий успешно обновлен';
        header("Location: ".FOLDER."/_admin?item=categories");
    }

    function cancelAction(){
        unset($_SESSION['id']);
        header("Location: ".FOLDER."/_admin?item=categories");
    }

    function clearArchiveCategories(){
        clearCategories();
        header("Location: ".FOLDER."/_admin?item=categories");
    }

    function initOnSession(){
        $_SESSION['id'] = $_GET['id'];
    }

    if(isset($_GET['item']) && $_GET['item'] == 'categories'){
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case "readd":
                    popOfArchive();
                    break;

                case "clear":
                    clearArchiveCategories();
                    break;

                case "remove":
                    addIntoArvhive();
                    break;

                case "cancel":
                    cancelAction();
                    break;

                case "update":
                    updateCategories();
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