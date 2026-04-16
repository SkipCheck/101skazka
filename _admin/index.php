<?php
    $title = "Настройка сайта";
    include 'includes/header.php';
?>
<?php
    if(!is_auth()){
        header("Location: auth.php");
        die;
    }
?>
<?php
    function categoriesContent(){
        include "includes/categoriesListener.php";
        echo "<h1>Категории услуг</h1>";

        if(isset($_GET['action']) && (($_GET['action'] == 'add') || ($_GET['action'] == 'edit'))){
            include "includes/formcategories.php";
        }

        include "includes/categoriesTable.php";
    }

    function servicesContent(){
        include "includes/servicesListener.php";
        echo "<h1>Список услуг</h1>";
        if(isset($_GET['action']) && (($_GET['action'] == 'add') || ($_GET['action'] == 'edit'))){
            include "includes/formservices.php";
        }
        include "includes/servicesTable.php";
    }

    function newsContent(){
        include "includes/newsListener.php";
        echo "<h1>Новости</h1>";

        if(isset($_GET['action']) && (($_GET['action'] == 'add') || ($_GET['action'] == 'edit'))){
            include "includes/formnews.php";
        }

        include "includes/newstable.php";
    }

    function questionsContent(){
        include "includes/questionListener.php";
        echo "<h1>Вопрос-ответ</h1>";
        
        if(isset($_GET['action']) && (($_GET['action'] == 'add') || ($_GET['action'] == 'edit'))){
            include "includes/formquestions.php";
        }

        include "includes/questionstable.php";
    }

    function galleryContent(){
        include "includes/galleryListener.php";
        echo "<h1>Галерея</h1>";

        include "includes/galleryTable.php";
    }

    function ordersContent(){
        include "includes/ordersListener.php";
        echo "<h1>Заказы</h1>";
    ?>
        <div id="dynamic-table-orders">
        </div>
    <?php
    }

    function feedbackContent(){
        include "includes/feedbackListener.php";
        echo "<h1>Обратная связь</h1>";
    ?>
        <div id="dynamic-table-feedback">
        </div>
    <?php
    }
?>
<section class="admin-panel d-flex">
    <?php
        include 'includes/sidebar.php';
    ?>
    <div class="admin-content ">
        <?php
            if(isset($_GET['item'])){
                switch($_GET['item']){

                    case "categories":
                        categoriesContent();
                        break;
                    
                    case "services":
                        servicesContent();
                        break;

                    case "news":
                        newsContent();
                        break;

                    case "gallery":
                        galleryContent();
                        break;
                    
                    case "questions":
                        questionsContent();
                        break;

                    case "orders":
                        ordersContent();
                        break;

                    case "feedback":
                        feedbackContent();
                        break;
                }
            }else{
                echo "<h1>Добро пожаловать,".$_SESSION['user']['name']."</h1>";
            }
        ?>
    </div>
</section>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
<script src="js/modal.js"></script>
</body>
</html>