<?php
    include "config.php";
?>
<?php
    function user_auth(){
        global $pdo;
        if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])){
            
            $login = $_POST['login'];
            $password = $_POST['password'];
            $query = $pdo->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
            $query->execute(['login' => $login, 'password' => md5($password)]);
            $user = $query->fetch();
            $_SESSION['user'] = $user;
            header("Location: index.php");
        }
    }

    function is_auth(){
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            return true;
        }
        return false;
    }

    //функции категорий
    function readdCategory($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `categories` SET status = "0" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function freezeCategory($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `categories` SET status = "1" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function get_allCategories($count = -1){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `categories` LIMIT :limit');
        $query->execute(['limit' => $count]);    
        return $query->fetchAll();
    }

    function get_categories($count = -1, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `categories` WHERE status = :status LIMIT :limit');
        $query->execute(['status' => $status, 'limit' => $count]);    
        return $query->fetchAll();
    }

    function get_categoryID($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `categories` WHERE id = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function clearCategories(){
        global $pdo;
        $currentCategories = get_categories(-1, 1);
        foreach($currentCategories as $category){
            removeAtCategoryId($category['id']);
        }
        $query = $pdo->prepare('DELETE FROM `categories` WHERE status = "1"');
        $query->execute();
    }

    //функции новостей
    function get_news($count = -1, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `news` WHERE status = :status ORDER BY date DESC');
        $query->execute(['status' => $status]);    
        return $query->fetchAll();
    }

    function get_newsID($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `news` WHERE id = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function readdNews($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `news` SET status = "0" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function freezeNews($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `news` SET status = "1" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function clearNews(){
        global $pdo;
        $query = $pdo->prepare('DELETE FROM `news` WHERE status = "1"');
        $query->execute();
    }

    //функции вопросов
    function get_questions($count = -1, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `questions` WHERE status = :status LIMIT :limit');    
        $query->execute(['status' => $status,'limit' => $count]);    
        return $query->fetchAll();
    }

    function get_questionId($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `questions` WHERE id = :id');    
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function freezeQuestion($id = ''){
        global $pdo;
        $query = $pdo->prepare('UPDATE `questions` SET status = "1" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function readdQuestion($id = ''){
        global $pdo;
        $query = $pdo->prepare('UPDATE `questions` SET status = "0" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function clearQuestions(){
        global $pdo;
        $query = $pdo->prepare('DELETE FROM `questions` WHERE status = "1"');
        $query->execute();
    }

    //функции галереи
    function get_gallery($count = -1){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `gallery` LIMIT :limit');    
        $query->execute(['limit' => $count]);    
        return $query->fetchAll();
    }

    //функции услуг
    function get_countservice($id, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT COUNT(id) AS cnt_service FROM `services` WHERE id_category = :id and status = :status');
        $query->execute(['id' => $id, 'status' => $status]);    
        return $query->fetch();
    }

    function removeAtCategoryId($id){
        global $pdo;
        $services = get_services($id);
        foreach($services as $service){
            removeGallery($service['id']);
        }

        $query = $pdo->prepare('DELETE FROM `services` WHERE id_category = :id');
        $query->execute(['id' => $id]);
    }

    function get_serviceId($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `services` WHERE id = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_servicesJust($status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `services` WHERE status = :status');
        $query->execute(['status' => $status]);    
        return $query->fetchAll();
    }

    function get_services($id, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `services` WHERE id_category = :id and status = :status');
        $query->execute(['id' => $id, 'status' => $status]);    
        return $query->fetchAll();
    }

    function get_previewPhotoService($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `servicegallery` WHERE id_service = :id LIMIT 1');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function freezeService($id = ''){
        global $pdo;
        $query = $pdo->prepare('UPDATE `services` SET status = "1" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function readdService($id = ''){
        global $pdo;
        $query = $pdo->prepare('UPDATE `services` SET status = "0" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function removeGallery($id){
        global $pdo;
        $query = $pdo->prepare('DELETE FROM `servicegallery` WHERE id_service = :id');
        $query->execute(['id' => $id]);
    }

    function removePhoto($idService, $idPhoto){
        global $pdo;
        $query = $pdo->prepare('DELETE FROM `servicegallery` WHERE id_service = :id and id = :id_photo');
        $query->execute(['id' => $idService, 'id_photo' => $idPhoto]);
    }

    function clearServices(){
        global $pdo;

        $servicesCurrent = get_servicesJust(1);
        foreach($servicesCurrent as $row){
            removeGallery($row['id']);
        }

        $query = $pdo->prepare('DELETE FROM `services` WHERE status = "1"');
        $query->execute();
    }

    function get_galleryService($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `servicegallery` WHERE id_service = :id');
        $query->execute(['id' => $id]);    
        return $query->fetchAll();
    }

    //функции заказов
    function get_countActiveOrders(){
        global $pdo;
        $query = $pdo->prepare('SELECT COUNT(id) as cnt_orders FROM `orders` WHERE status = 0');
        $query->execute();    
        return $query->fetch();
    }

    function get_orders($status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `orders` WHERE status = :status ORDER BY date DESC');
        $query->execute(['status' => $status]);    
        return $query->fetchAll();
    }

    function get_orderId($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `orders` WHERE id = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function freezeOrder($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `orders` SET status = "1" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function readdOrder($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `orders` SET status = "0" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    //функции обратной связи

    function get_countActiveFeedback(){
        global $pdo;
        $query = $pdo->prepare('SELECT COUNT(id) as cnt_feedback FROM `feedback` WHERE status = 0');
        $query->execute();    
        return $query->fetch();
    }

    function get_feedbacks($status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `feedback` WHERE status = :status ORDER BY date DESC');
        $query->execute(['status' => $status]);    
        return $query->fetchAll();
    }

    function get_feedbackId($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `feedback` WHERE id = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function freezeFeedback($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `feedback` SET status = "1" WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    function readdFeedback($id){
        global $pdo;
        $query = $pdo->prepare('UPDATE `feedback` SET status = "0" WHERE id = :id');
        $query->execute(['id' => $id]);
    }
?>