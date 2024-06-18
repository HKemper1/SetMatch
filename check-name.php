
<?php
require_once "path.php";
require_once $abs_path . "/db/db.php";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['teamname'])) {
            $teamname = $_POST['teamname'];
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE teamname = :teamname");
            $stmt->execute(['teamname' => $teamname]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo 'taken';
            } else {
                echo 'available';
            }
        }
        ?>