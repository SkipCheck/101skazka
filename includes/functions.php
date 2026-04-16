<?php
    function get_newslist($count = -1, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `news` WHERE status = :status ORDER BY date DESC LIMIT :limit');    
        $query->execute(['status' => $status,'limit' => $count]);    
        return $query->fetchAll();
    }

    function get_oldestNews($count = -1, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `news` WHERE status = :status ORDER BY date LIMIT :limit');    
        $query->execute(['status' => $status,'limit' => $count]);    
        return $query->fetchAll();
    }

    function get_newsId($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `news` WHERE id = :id');    
        $query->execute(["id" => $id]);    
        return $query->fetch();
    }

    function get_questions($count = -1){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `questions` WHERE status = "0" LIMIT :limit');    
        $query->execute(['limit' => $count]);    
        return $query->fetchAll();
    }

    function get_gallery($count = -1){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `gallery` LIMIT :limit');
        $query->execute(['limit' => $count]);    
        return $query->fetchAll();
    }

    function get_categories($count = -1, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `categories` WHERE status = :status LIMIT :limit');
        $query->execute(['status' => $status, 'limit' => $count]);    
        return $query->fetchAll();
    }

    function get_categoriesWithName($name = "", $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `categories` WHERE status = :status and name = :name');
        $query->execute(['status' => $status, 'name' => $name]);    
        return $query->fetch();
    }

    function get_categoryId($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `categories` WHERE id = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_services($count = -1, $id, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `services` WHERE id_category = :id and status = :status LIMIT :limit');
        $query->execute(['id' => $id, 'limit' => $count, 'status' => $status]);    
        return $query->fetchAll();
    }

    function get_filteredService($count = -1, $id, $status, $minages, $maxages){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `services` WHERE id_category = :id and status = :status and minages = :minages and maxages = :maxages LIMIT :limit');
        $query->execute(['id' => $id, 'limit' => $count, 'status' => $status, 'minages' => $minages, 'maxages' => $maxages]);    
        return $query->fetchAll();
    }

    function get_galleryService($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `servicegallery` WHERE id_service = :id');
        $query->execute(['id' => $id]);    
        return $query->fetchAll();
    }

    function get_previewImageService($id){
        global $pdo;
        $query = $pdo->prepare('SELECT image FROM `servicegallery` WHERE id_service = :id LIMIT 1');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_photoCount($id){
        global $pdo;
        $query = $pdo->prepare('SELECT COUNT(id) as photoCount FROM `servicegallery` WHERE id_service = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_serviceId($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `services` WHERE id = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_countservice($count = -1, $id){
        global $pdo;
        $query = $pdo->prepare('SELECT COUNT(id) AS cnt_service FROM `services` WHERE id_category = :id LIMIT :limit');
        $query->execute(['id' => $id, 'limit' => $count]);    
        return $query->fetch();
    }

    function get_aloneCategory($limit = -1){
        global $pdo;
        $query = $pdo->prepare('SELECT id_category FROM `services` GROUP BY id_category HAVING COUNT(*) = 1 LIMIT :limit');
        $query->execute(['limit' => $limit]);    
        return $query->fetchAll();
    }

    function get_aloneService($id){
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM `services` WHERE id_category = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_minPrice($id){
        global $pdo;
        $query = $pdo->prepare('SELECT MIN(price) AS min_price FROM `services` WHERE id_category = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_minUnits($id){
        global $pdo;
        $query = $pdo->prepare('SELECT units FROM `services` as t1, (SELECT id_category, MIN(price) as minPrice FROM `services` as t2 GROUP BY id_category) as t3
                                WHERE t1.price = t3.minPrice and t1.id_category = t3.id_category and t1.id_category = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }

    function get_MinMaxAges($id){
        global $pdo;
        $query = $pdo->prepare('SELECT MIN(minages) AS minAge, MAX(maxages) AS maxAge FROM `services` WHERE id_category = :id');
        $query->execute(['id' => $id]);    
        return $query->fetch();
    }
    
    function get_groupServices($id, $status = 0){
        global $pdo;
        $query = $pdo->prepare('SELECT minages, maxages FROM `services` WHERE id_category = :id and status = :status GROUP BY minages, maxages');
        $query->execute(['id' => $id, 'status' => $status]);    
        return $query->fetchAll();
    }
?>