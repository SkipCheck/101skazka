<?php
    $title = "Авторизация";
    include 'includes/header.php';
?>
<?php
    if(empty($_SESSION['user']) && isset($_POST['login']) && isset($_POST['password'])){
        echo "<script>alert('Данный пользователь не существует');</script>";
    }
?>
<div class="text-center d-flex align-items-center h-100 col-md-4">
    <main class="form-signin w-100 m-auto">
        <div class="container">
            <form action="auth.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
                <div class="form-floating mb-3">
                    <input type="text" name="login" class="form-control " id="floatingInput" placeholder="Логин"
                     value="<?php echo isset($_POST['login']) ? $_POST['login'] : '' ?>">
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Пароль"
                     value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
            </form>
        </div>
    </main>
</div>
<?php
    user_auth();
?>
<script src="js/script.js"></script>
</body>
</html>