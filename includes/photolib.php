<section class="photo element__animation">
        <h2>Наши фото</h2>
        <div class="content-photo">
            <div class="swiper" >
            <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php
                        $gallery = get_gallery();
                        foreach($gallery as $row){
                    ?>
                        <div class="swiper-slide"><img src="<?=$row['path']?>" alt=""></div>
                    <?php
                        }
                    ?>
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev btn-nav"></div>
                <div class="swiper-button-next btn-nav"></div>
            </div>
        </div>
</section>