<footer class="footer__content element__animation">
    <div class="main__content">
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.svg" alt="">
            </a>
        </div>
        <div class="info__footer">
            Если вы решили организовать торжество детям, то попали как раз по адресу.<br>
            101 Сказка - агентство детских праздников в Березниках устроит грандиозный праздник для вашего ребенка!
        </div>
        <a href="mailto:tipapochta@gmail.com" class="mail">tipapochta@gmail.com</a>
    </div>
    <div class="socials">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><img src="img/uploads/socials/youtube.svg" alt=""></a>
        <a href="https://vk.com/bf.pnrpu_memes" target="_blank"><img src="img/uploads/socials/vk.svg" alt=""></a>
        <a href="https://wa.me/78005553535" target="_blank"><img src="img/uploads/socials/whats.svg" alt=""></a>
        <a href="https://www.facebook.com/" target="_blank"><img src="img/uploads/socials/face.svg" alt=""></a>
    </div>
    <div class="footer__bottom">
        ©2023 101skazka
    </div>
</footer>
<?php
    include "modalorder.php";
    include "includes/modalfeedback.php";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/script.js"></script>
<script src="js/phonemask.js"></script>
<script src="js/menulogic.js"></script>
<?php
    if(isset($_SESSION['success'])){
?>
    <script src="js/successalert.js"></script>
<?php
        unset($_SESSION['success']);
    }
?>
</body>
</html>