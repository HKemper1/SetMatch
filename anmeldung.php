<?php include_once "php/head.php" ?>
<body>
    <section>
        <h2>Anmelden</h2>

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
                <button type="submit">Anmelden</button>
            </div>
        </form>

    </section>
</body>
</html>
