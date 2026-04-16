<h2 class='mt-5'>Активные услуги</h2>
<div class="table table-hover table-services">
    
    <?php 
        $categories = get_allCategories(-1);
        foreach($categories as $row){
            if(get_countservice($row['id'])['cnt_service'] > 0){
    ?>
        <div class="single__block" style="<?=($row['status'] == 0 ? "border-color: blue" : "border-color: #aa1cb1;")?>">
            <div class="category-name"><?=$row['name'] ?></div>
            <div class="services-block">
        <?php
                $services = get_services($row['id']);
                foreach($services as $service){
                    $photo = get_previewPhotoService($service['id']);
        ?>
                <div class="service-item">
                    <div class="name"><?=$service['title']?></div>
                    <div class="preview-image"><img src="../<?=$photo['image']?>" alt=""></div>
                    <div class="price">Цена: <?=$service['price']?> руб.</div>
                    <div class="age-category">Возрастная категория: <?=$service['minages']."-".$service['maxages']?> лет</div>
                    <div class="units">Минимальное время: <?=$service['units']?></div>
                    <div class="actions">
                        <a class="btn btn-outline-warning" href="?item=services&action=edit&id=<?=$service['id']?>">
                                Редактировать
                        </a>
                        <a class="btn btn-outline-danger" href="?item=services&action=remove&id=<?=$service['id']?>">
                                Добавить в архив
                        </a>
                    </div>
                    
                </div>
        <?php
                }
        ?>
            </div>
        </div>
       
    <?php
            }
        }
    ?>
</div>

<h2 class='mt-5'>Услуги в архиве</h2>
<div class="table table-hover table-services">
    <?php 
        $categories = get_allCategories();
        foreach($categories as $row){
            if(get_countservice($row['id'], 1)['cnt_service'] > 0){
    ?>
        <div class="single__block">
            <div class="category-name"><?=$row['name'] ?></div>
            <div class="services-block removed">
        <?php
                $services = get_services($row['id'], 1);
                foreach($services as $service){
                    $photo = get_previewPhotoService($service['id']);
        ?>
                <div class="service-item">
                    <div class="name"><?=$service['title']?></div>
                    <div class="preview-image"><img src="../<?=$photo['image']?>" alt=""></div>
                    <div class="price">Цена: <?=$service['price']?> руб.</div>
                    <div class="age-category">Возрастная категория: <?=$service['minages']."-".$service['maxages']?> лет</div>
                    <div class="units">Минимальное время: <?=$service['units']?></div>
                    <div class="actions">
                        <a class="btn btn-outline-primary" href="?item=services&action=readd&id=<?=$service['id']?>">
                                Восстановить
                        </a>
                    </div>
                    
                </div>
        <?php
                }
        ?>
        </div>
        </div>
        
    <?php
            }
        }
    ?>
</div>

<a class="btn btn-outline-primary mt-5" href="?item=services&action=add">Добавить новую услугу</a>