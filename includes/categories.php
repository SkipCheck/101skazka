<div class="categories__list">
    <?php 
        foreach($categories as $row){
                $count = get_countservice(-1, $row['id'])['cnt_service'];
                $minAge = get_MinMaxAges($row['id'])['minAge'];
                $maxAge = get_MinMaxAges($row['id'])['maxAge'];
                $minUnits = get_minUnits($row['id']);
    ?>
        <div class="service__item element__animation">
            <img src="<?=$row['image']?>" alt="">
            <div class="item-name"><?=$row['name']?></div>
            <div class="item-price"><?=($count > 1 ? "от " : "")?>
                <?=get_minPrice($row['id'])['min_price']?> руб.<span class="time">/ <?=(isset($minUnits['units']) ? $minUnits['units'] : '')?></span>
            </div>
            <a href="<?php 
                        if($count > 1){
                            echo "?category=".$row['id'];
                        }else if($count == 1){
                            $services = get_services(-1, $row['id']);
                            echo "?category=".$row['id']."&service=".$services[0]['id'];
                        }

                    ?>" class="item-button category-button">Подробнее</a>
            <span class="item-label"><?=$minAge?>-<?=$maxAge?> лет</span>
        </div>
    <?php } ?>
</div>