<div>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/header.php'?>
    <div>
        <h1>Login</h1>
        <form action="/auth/login.php" method="post">
            <p>Login: <input type="text" name="login" /></p>
            <p>Password: <input type="password" name="password" /></p>
            <p><input type="submit" /></p>
        </form>
    </div>
    <hr/>
    <div>
        <div>
            <h1>Registry</h1>
            <form action="/auth/registry.php" method="post">
                <p>Login: <input type="text" name="login" /></p>
                <p>Password: <input type="password" name="password" /></p>
                <p>Repeat password: <input type="password" name="r_password" /></p>
                <p><input type="submit" /></p>
            </form>
        </div>
    </div>
</div>

