<?php
    $serviceGallery = get_galleryService($service['id']);
    $countPhoto = get_photoCount($service['id']);
?>
<div class="service-page">
    <div class="order-card element__animation">
        <div class="item-info">
            <div class="service-details">
                <div class="confine">
                    <img src="img/time.svg" alt="">
                    <span><?=$service['units']?></span>
                </div>
                <div class="confine">
                    <img src="img/child.svg" alt="">
                    <span><?=$service['minages']?>-<?=$service['maxages']?> лет</span>
                </div>
            </div>
            <div class="price-detail">
                <div class="price-title">Стоимость работы</div>
                <div class="price-item">от <?=$service['price']?> руб.</div>
            </div>
            <div class="request">
                <?php
                    include "includes/orderform.php";
                ?>
            </div>
        </div>
        <div class="title-image">
            <img class="preview-title" src="<?=get_previewImageService($service['id'])['image']?>" alt="">
        </div>
    </div>
    <div class="gallery element__animation">
        <div class="swiper-gallery gallery_main">
            <div class="swiper-wrapper">
                <?php
                    foreach($serviceGallery as $row){
                ?>
                    <div class="swiper-slide"><img src="<?=$row['image']?>"></div>
                <?php
                    }
                ?>
            </div>
            <div class="swiper-button-prev btn-nav"></div>
            <div class="swiper-button-next btn-nav"></div>
        </div>
        <div class="swiper-gallery gallery_thumbs">
            <div class="swiper-wrapper">
                <?php
                    foreach($serviceGallery as $row){
                ?>
                    <div class="swiper-slide"><img src="<?=$row['image']?>"></div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="description element__animation">
        <h2> Описание </h2>
        <pre class="format-text"><?=$service['description']?>
        </pre>
    </div>
    <div class="label element__animation">
        Заказать любую услугу на день рождения ребенка можно по тел: +7 (800) 555-35-35.<br>
        Так же Вы можете сделать запрос на мероприятие прямо сейчас!
    </div>
</div>

<script>
const swiper_thumbnail = new Swiper(".gallery_thumbs", {  //added
  slidesPerView: <?=$countPhoto['photoCount']?>,                                       //added
})  

const gallery = new Swiper('.gallery_main', {
  loop: true,
  navigation: {                       
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  thumbs: {                       //added
    swiper: swiper_thumbnail,   //added
  }, 
})
</script>