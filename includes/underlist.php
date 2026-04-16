
<div class="services__block element__animation"> 
    
    <div class="filter_group">
        <a href="?category=<?=$activeCategory?>" class="item-filter <?=(!isset($_GET['minages']) && !isset($_GET['maxages']) ?'active-filter' : "")?>"><div>Все</div></a>
        <?php 
            $ages = get_groupServices($activeCategory);
            foreach($ages as $age){
        ?>
            <a href="?category=<?=$activeCategory?>&minages=<?=$age['minages']?>&maxages=<?=$age['maxages']?>"
            class="item-filter <?=(isset($_GET['minages']) && isset($_GET['maxages']) ? (($_GET['minages'] == $age['minages']) && ($_GET['maxages'] == $age['maxages']) ? "active-filter" : "") : "")?>"><div><?=$age['minages']?>-<?=$age['maxages']?> лет</div></a>

        <?php
            }
        ?>
    </div>
    <div class="services__list">
    <?php
        $services = (!isset($_GET['minages']) && !isset($_GET['maxages']) ? get_services(-1, $activeCategory) : get_filteredService(-1, $activeCategory, 0, $_GET['minages'], $_GET['maxages']));
        foreach($services as $row){
    ?>
    <div class="service__item element__animation">
            <img src="<?=get_previewImageService($row['id'])['image']?>" alt="">
            <div class="item-name" value="<?=$row['id']?>"><a class="more-info" href="?category=<?=$activeCategory?>&service=<?=$row['id']?>"><?=$row['title']?></a></div>
            <div class="item-price"><?=($count > 1 ? "от " : "")?>
                <?=$row['price']?> руб.<span class="time">/ <?=$row['units']?></span>
            </div>
            <div class="item-button open-modal" data-open="#modal-order" class="item-button">Заказать</div>
            <span class="item-label"><?=$row['minages']?>-<?=$row['maxages']?> лет</span>
    </div>
        <?php
        }
    ?>
    </div>
</div>