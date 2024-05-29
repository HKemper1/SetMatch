<?php
if (!isset($abs_path)) {
    require_once "path.php";
}
require_once $abs_path . "/php/include/head.php";
require_once $abs_path . "/db/db.php";
?>

<body>
<?php require_once $abs_path . "/php/include/header.php"; ?>
<main>
    <div class="regcontainer regBody">
        <h1>Registrierung</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $teamname = $_POST['teamname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_repeat = $_POST['password_repeat'];

            if ($password == $password_repeat) {
                $db->beginTransaction();
                try {
                    $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE teamname = :teamname OR email = :email");
                    $stmt->execute(['teamname' => $teamname, 'email' => $email]);
                    $count = $stmt->fetchColumn();

                    if ($count == 0) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $db->prepare("INSERT INTO users (teamname, email, password) VALUES (:teamname, :email, :password)");
                        $stmt->execute(['teamname' => $teamname, 'email' => $email, 'password' => $hashed_password]);
                        $db->commit();
                        echo "Registrierung erfolgreich!";
                    } else {
                        $db->rollBack();
                        echo "Teamname oder E-Mail bereits vergeben!";
                    }
                } catch (Exception $e) {
                    $db->rollBack();
                    echo "Fehler: " . $e->getMessage();
                }
            } else {
                echo "Passwörter stimmen nicht überein!";
            }
        }
        ?>

        <form action="" method="POST">
            <div class="formContainerReg">
                <label class="labelReg" for="teamname">Teamname</label>
                <div>
                    <input type="text" id="teamname" name="teamname" maxlength="100" required>
                </div>
            </div>
            <div class="formContainerReg">
                <label class="labelReg" for="email">E-Mail</label>
                <div>
                    <input type="email" id="email" name="email" maxlength="100" required>
                </div>
            </div>
            <div class="formContainerReg">
                <label class="labelReg" for="password">Kennwort</label>
                <div>
                    <input type="password" id="password" name="password" minlength="8" maxlength="100" required>
                </div>
            </div>
            <div class="formContainerReg">
                <label class="labelReg" for="password_repeat">Kennwort wiederholen:</label>
                <div>
                    <input type="password" id="password_repeat" name="password_repeat" minlength="8" maxlength="100" required>
                </div>
            </div>
            <div>
                <a class="anmeldeLink" href="anmeldung.php">Anmeldung</a>
                <button class="button" type="submit">Registrieren</button>
            </div>
        </form>
    </div>
</main>
<?php include_once $abs_path . "/php/include/footer.php"; ?>
</body>
</html>
