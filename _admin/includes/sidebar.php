
<div class="sidebar">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100" style="width: 280px;">
                <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">
                        Главная
                    </span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="?item=news" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'news')) echo 'active';?>" aria-current="page">
                        Новости
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?item=categories" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'categories')) echo 'active';?>" aria-current="page">
                        Категории услуг
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?item=services" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'services')) echo 'active';?>" aria-current="page">
                        Список услуг
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?item=orders" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'orders')) echo 'active';?>" aria-current="page">
                        <div class="dynamic-value">
                            Заказы
                            <span id="dynamic-orders" class="changed-value">
                                0
                            </span>
                        </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?item=feedback" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'feedback')) echo 'active';?>" aria-current="page">
                        <div class="dynamic-value" id="dynamic">
                            Обратная связь
                            <span id="dynamic-feedback" class="changed-value">
                                0
                            </span>
                        </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?item=questions" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'questions')) echo 'active';?>" aria-current="page">
                            Вопрос-ответ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?item=gallery" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'gallery')) echo 'active';?>" aria-current="page">
                            Галерея
                        </a>
                    </li>
                    <li>
                        <a href="exit.php" class="nav-link text-white <?php if(isset($_GET['item']) && ($_GET['item'] == 'exit')) echo 'active';?>">
                            Выход
                        </a>
                    </li>
            </div>
        </div>