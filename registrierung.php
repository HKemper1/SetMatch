<?php
session_start(); // Sitzung starten

if (!isset($abs_path)) {
    require_once "path.php";
}
require_once $abs_path . "/php/include/head.php";
require_once $abs_path . "/db/db.php";
require_once $abs_path . "/php/controller/Registrierung.php";
?>
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
                <label  class="labelReg" for="password">Kennwort</label>
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
            <div>
                <a class="anmeldeLink" href="anmeldung.php">Anmeldung</a>
                <button class="button" type="submit">Registrieren</button>
            </div>
        </form>
    </div>
</main>
<script src="/js/registrierung.js."></script>
<?php include_once $abs_path . "/php/include/footer.php"; ?>
</body>
</html>
