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

                try {
                    $stmt = $db->prepare("SELECT * FROM users WHERE teamname = :teamname");
                    $stmt->execute(['teamname' => $teamname]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['teamname'] = $teamname;
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "Teamname oder Passwort falsch!";
                    }
                } catch (Exception $e) {
                    echo "Fehler: " . $e->getMessage();
                }
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

            <?php
            if ($count == 0 && $_SERVER['REQUEST_METHOD'] == 'POST') {
                // Registrierung erfolgreich, Benutzer anmelden
                $_SESSION['teamname'] = $teamname;
                // Weiterleitung zu Inex
                header("Location: index.php");
                exit();
            }
            ?>
        </section>
    </div>
</main>
<?php include_once $abs_path . "/php/include/footer.php"; ?>
</body>
</html>
