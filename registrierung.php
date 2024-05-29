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
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO users (teamname, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $teamname, $email, $hashed_password);

                if ($stmt->execute()) {
                    echo "Registrierung erfolgreich!";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
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
