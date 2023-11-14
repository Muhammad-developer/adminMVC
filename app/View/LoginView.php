<div class="container w-25 start-50 top-50">
    <main class="form-signin">
        <form action="/app/View/LogoutView.php" method="post">
<!--            <img class="mb-4" src="/images/logo" alt="" width="72" height="57">-->
            <h1 class="h3 mb-3 fw-normal text-sm-center">Авторизация</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="" name="login">
                <label for="floatingInput">Логин</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Пароль" name="password">
                <label for="floatingPassword">Пароль</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Запомнить меня
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="logout">Вход</button>
            <p class="mt-5 mb-3 text-muted">© 2023</p>
        </form>
    </main>
</div>