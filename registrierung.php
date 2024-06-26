<?php
session_start(); // Sitzung starten

if (!isset($abs_path)) {
    require_once "path.php";
}
require_once $abs_path . "/php/include/head.php";
require_once $abs_path . "/db/db.php";
require_once $abs_path . "/php/controller/Registrierung.php";
?>


<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com">

<?php include_once "check-name.php"; ?>

<body>
<?php require_once $abs_path . "/php/include/header.php"; ?>
<main>
    <div class="regcontainer regBody">
        <h1>Registrierung</h1>
        <div id="teamname_message"></div>

        <form action="" method="POST">
            <div class="formContainerReg">
                <label class="labelReg" for="teamname">Teamname</label>
                <div>
                    <input class="inputReg" type="text" id="teamname" name="teamname" maxlength="100" required>
                </div>
            </div>
            <div class="formContainerReg">
                <label class="labelReg" for="email">E-Mail</label>
                <div>
                    <input class="inputReg" type="email" id="email" name="email" maxlength="100" required>
                </div>
            </div>
            <div class="formContainerReg">
                <label class="labelReg" for="password">Kennwort</label>
                <div>
                    <input class="inputReg" type="password" id="password" name="password" minlength="8" maxlength="100" required>
                </div>
            </div>
            <div class="formContainerReg">
                <label class="labelReg" for="password_repeat">Kennwort wiederholen:</label>
                <div>
                    <input class="inputReg" type="password" id="password_repeat" name="password_repeat" minlength="8" maxlength="100" required>
                </div>
            </div>
            <div class="formContainerReg">
                <label>
                    <input type="checkbox" id="terms" name="terms" required>
                    Ich habe die <a href="datenschutz.php" target="_blank">Datenschutzerklärung</a> und die <a href="nutzerbedingungen.php" target="_blank">Nutzungsbedingungen</a> gelesen und akzeptiere diese.
                </label>
            </div>

            <div class="formContainerReg">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
            </div>

            <a class="anmeldeLink" href="anmeldung.php">Anmeldung</a>
            <button class="button" type="submit">Registrieren</button>
        </form>
    </div>
</main>
<?php include_once $abs_path . "/php/include/footer.php"; ?>

<script src="js/google-in..js"></script>
</body>
</html>
