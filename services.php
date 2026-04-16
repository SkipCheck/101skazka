<?php
    $title = 'Важные услуги на праздник';
?>
<?php
    include "includes/header.php";
    include "includes/navmenu.php";
?>
<?php
    $categories = get_categories();
    $activeCategory = (isset($_GET['category']) ? $_GET['category'] : null);
    $service = (isset($_GET['service']) ? get_serviceId($_GET['service']) : '');
    $title = '';
    if(!isset($_GET['service'])){
        $title = "<h2>"."Наши ".($activeCategory > 0 ? get_categoryId($activeCategory)['name'] : "услуги")."</h2>";
    }else{
        $title = "<h2>".$service['title']."</h2>";
    }
?>
<section class="services-banner element__animation">
    <div class="opacity__block"></div>
    <div class="container">
        <div class="content">
            <h2>Аниматоры на день рождения, детский праздник в Москве от 2000 руб.</h2>
            <p>Вы еще не выбрали тематику дня рождения ребенка? 
               Предлагаем следующие варианты проведения (список не полный, наши аниматоры с удовольствием дополнят его):
               игровая программа со сказочными персонажами; зажигательные танцы-дискотека; изысканное пати или вечеринка в любимом стиле; 
               загадочные и познавательные квесты; психологические игры крокодил и мафия (особенно подойдут подростковому возрасту); 
               и еще много всего интересного.
            </p>
        </div>
    </div>
</section>
<section class="categories__block element__animation">
    <div class="container">
        <?=$title?>
        <div class="categories-content">
            <div class="categories-navigation element__animation">
                <a href = "services.php" class="main-point <?=(empty($activeCategory) ? "_active-point" : null)?>"><div>Услуги</div></a>
                <div class="points-list">
                    <ul id="services-menu">
                        <?php 
                            foreach($categories as $row){
                                $count = get_countservice(-1, $row['id'])['cnt_service'];
                                if($count > 1){ echo "<div class='more__level'>";}
                        ?>
                                <li class="<?=($count > 1 ? 'category-name ' : '')?><?=($activeCategory == $row['id'] ? '_active-point' : '')?>">
                                    <?php
                                        
                                        $services = get_services(-1, $row['id']);
                                        if($count == 1 && !empty($services)){
                                            echo '<a href="?category='.$row['id'].'&service='.$services[0]['id'].'"><div>';
                                        }
                                    ?>
                                        <?=$row['name']?>
                                    <?php
                                       echo ($count == 1 && !empty($services) ? "</div></a>" : "" );
                                    ?>
                                </li>
                        <?php 
                                if($count > 1){
                        ?>
                                <div class='under-list'>
                                <ul class='content-list'>
                        <?php
                                    foreach($services as $under_row){
                                        
                        ?>
                                    <li class="item-service">
                                        <a href="?category=<?=$row['id']?>&service=<?=$under_row['id']?>"><div><?=$under_row['title']?></div></a>
                                    </li>
                        <?php
                                    }
                        ?>
                                </ul>
                                </div>
                                </div>
                        <?php
                                }
                            } 
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                if(isset($service) && empty($service)){
                    if($activeCategory == 0){
                        include "includes/categories.php";
                    }else{
                        include "includes/underlist.php";
                    }
                }else{
                    include "includes/servicepage.php";
                }
            ?>
        </div>
    </div>
    <?php
            if(isset($service) && !empty($service)){
                if(isset($_GET['category'])){
                    $animators = get_categoriesWithName("Аниматоры")['id'];
                    if(isset($animators) && $_GET['category'] != $animators){
                        include "includes/popularAnimators.php";
                    }
                }
                include "includes/servicesAdditional.php";
            }
        ?>
</section>
<script src="js/servicescomponent.js"></script>
<?php
    include "includes/photolib.php";
    include "includes/beneficts.php";
    include "includes/questions.php";
    include "includes/footerform.php";
    include "includes/footer.php";
?>