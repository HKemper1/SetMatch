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
    <div class="anmContainer anmBody">
        <section>
            <h1>Anmelden</h1>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $teamname = $_POST['teamname'];
                $password = $_POST['password'];

                // Prepare and bind
                $stmt = $conn->prepare("SELECT * FROM users WHERE teamname = ?");
                $stmt->bind_param("s", $teamname);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['password'])) {
                        echo "Anmeldung erfolgreich!";
                        // Start session or redirect user
                        session_start();
                        $_SESSION['teamname'] = $teamname;
                        // Redirect to a logged-in page
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "Falsches Passwort!";
                    }
                } else {
                    echo "Kein Benutzer gefunden!";
                }

                $stmt->close();
            }
            ?>

            <form class="formContainerAnm" action="" method="POST">
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
                    <button class="button" type="submit">Anmelden</button>
                </div>
            </form>
        </section>
    </div>
</main>
<?php include_once $abs_path . "/php/include/footer.php"; ?>
</body>
</html>
