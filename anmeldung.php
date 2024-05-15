<?php
    if (!isset($abs_path)) {
        require_once "path.php";
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once $abs_path . "/php/controller/Anmelden.php";
}
?>
<?php
    require_once $abs_path . "/php/include/head.php";
?>

<body>
    <?php
        require_once $abs_path . "/php/include/header.php";
    ?>
    <br>
    <br>
    <br>
    <main>
        <div class="container">
        <section>
            <h1>Anmelden</h1>
            <?php if (!empty($login_error)): ?>
                <div class="error"><?php echo $login_error; ?></div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <label for="teamname">Teamname</label>
                    <div>
                        <input type="text" id="teamname" name="teamname" maxlength="100" required>
                    </div>
                </div>
                <div>
                    <label for="password">Passwort:</label>
                    <div>
                        <input type="password" id="password" name="password" maxlength="100" required>
                    </div>
                </div>
                <div>
                    <a href="registrierung.php" class="button">Registrieren</a>
                    <button class="button" type="submit" name="login">Anmelden </button>
                </div>
            </form>
        </section>
        </div>
    </main>
    <?php 
        include_once $abs_path . "/php/include/footer.php";
    ?>
</body>

</html>
