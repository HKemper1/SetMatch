<?php include_once "php/head.php" ?>

//TODO erstmal nur die Variablen 
$teamname;
$passwort;

<?php
require_once $abs_path . "/php/include/head.php";
?>
<body>
<main>
    <div class="container">
    <section>
        <h1>Anmelden</h1>

        <form action="index.php" method="POST">
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
                <button class="button" type="submit">Anmelden </button>
            </div>
        </form>

    </section>
    </div>
</main>
<?php include_once "php/footer.php" ?>
</body>

</html>
