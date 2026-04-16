<section class="additional-services element__animation">
    <div class="container">
        <h2>Чем еще можно дополнить праздник?</h2>
        <div class="additional-cards element__animation">
            <?php
                $aloneCategories = get_aloneCategory(4);
                foreach($aloneCategories as $aloneCategory){
                    $service = get_aloneService($aloneCategory['id_category']);
                    $preview = get_previewImageService($service['id'])['image'];
            ?>
                <div class="addition-item element__animation">
                    <img src="<?=$preview?>" alt="">
                    <div class="item-name"><?=$service['title']?></div>
                    <div class="item-price"><?=$service['price']?> руб.<span class="time">/ <?=$service['units']?></span></div>
                    <a href="services.php?category=<?=$aloneCategory['id_category']?>&service=<?=$service['id']?>" class="item-button">Подробнее</a>
                    <span class="item-label"><?=$service['minages']?>-<?=$service['maxages']?> лет</span>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>