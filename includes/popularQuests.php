<?php
    $categoryId = get_categoriesWithName("Квесты")['id'];
?>

<section class="popular__quests element__animation">
    <div class="container">
        <h2>Наши квесты</h2>
        <div class="quest__list">
            <?php
                $quests = get_services(8, $categoryId);
                foreach($quests as $quest){
                    $photo = get_previewImageService($quest['id'])['image'];
            ?>
                <div class="quest__item element__animation">
                    <img src="<?=$photo?>" alt="">
                    <div class="item-name" value="<?=$quest['id']?>"><a class="more-info" href="services.php?category=<?=$categoryId?>&service=<?=$quest['id']?>"><?=$quest['title']?></a></div>
                    <div class="item-price"><?=$quest['price']?> руб.<span class="time">/ <?=$quest['units']?></span></div>
                    <div class="item-button open-modal" data-open="#modal-order">Заказать</div>
                    <span class="item-label"><?=$quest['minages']?>-<?=$quest['maxages']?> лет</span>
                </div>
            <?php
                }
            ?>
        </div>
        <a href="services.php?category=<?=$categoryId?>" class="more-quests">все квесты</a>
    </div>
</section>