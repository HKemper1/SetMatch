<?php
    if (!isset($abs_path)) {
        require_once "path.php";
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
        <div class="anmContainer anmBody">
        <section>
            <h1>Anmelden</h1>

            <form class="formContainerAnm" action="index.php" method="POST">
                <div>
                    <label class="labelAnm" for="teamname">Teamname</label>
                    <div>
                        <input type="text" id="teamname" name="teamname" maxlength="100" required>
                    </div>
                </div>
                <div>
                    <label class="labelAnm" for="password">Passwort:</label>
                    <div>
                        <input type="password" id="password" name="password" maxlength="100" required>
                    </div>
                </div>
                <div>
                    <a class="regLink" href="registrierung.php">Registrieren</a>
                    <button class="button" type="submit">Anmelden </button>
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
