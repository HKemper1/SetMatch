<?php
require_once "Eintrag.php";
require_once "ForumDAO.php";

class ForumPDOSQLite implements ForumDAO
{
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ForumPDOSQLite();
        }

        return self::$instance;
    }

    public function neuerEintrag($ueberschrift, $text)
    {
        try {
            $db = $this->getConnection();
            $sql = "INSERT INTO forum (ueberschrift, content) VALUES (:ueberschrift, :content);";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([":ueberschrift" => $ueberschrift, ":content" => $text])) {
                throw new InternerFehlerException();
            }
            return intval($db->lastInsertId());
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
    }
    public function getEintrag($id)
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM forum WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $id])) {
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                throw new FehlenderEintragException();
            }
            $entry = $result[0];
            return new Eintrag($entry["id"], $entry["ueberschrift"], $entry["content"]);
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
    }
    public function loescheEintrag($id)
    {
        try {
            $db = $this->getConnection();
            $db->beginTransaction();
            $sql = "SELECT * FROM forum WHERE id=:id LIMIT 1";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                $db->rollBack();
                throw new FehlenderEintragException();
            }
            $sql = "DELETE FROM forum WHERE id=:id";
            $command = $db->prepare($sql);
            if (!$command) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            if (!$command->execute([":id" => $id])) {
                $db->rollBack();
                throw new InternerFehlerException();
            }
            $db->commit();
        } catch (PDOException $exc) {
            $db->rollBack();
            throw new InternerFehlerException();
        }
    }

    public function getEintraege()
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM forum";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute()) {
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();

            $entries = [];
            foreach ($result as $row) {
                $entry = new Eintrag($row["id"], $row["ueberschrift"], $row["content"]);
                $entries[] = $entry;
            }
            return $entries;
        } catch (PDOException $exc) {
            throw new InternerFehlerException();
        }
    }

    private function getConnection()
    {
        global $abs_path;
        if (!file_exists($abs_path . "/db/forum.db")) {
            $this->anlegen();
        }

        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/db/forum.db';
            return new PDO($dsn, $user, $pw);
        } catch (PDOException $e) {
            throw new InternerFehlerException();
        }
    }

    private function anlegen()
    {
        global $abs_path;
        try {
            $user = 'root';
            $pw = null;
            $dsn = 'sqlite:' . $abs_path . '/db/forum.db';
            $db = new PDO($dsn, $user, $pw);

            $db->exec("
                    CREATE TABLE forum (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        ueberschrift TEXT,
                        content TEXT
                    );");
            $db->exec("
                    INSERT INTO forum (ueberschrift, content) VALUES
                        ('Überschrift 1',  'lorem ipsum 1')
                    ;");
            $db->exec("
                    INSERT INTO forum (ueberschrift, content) VALUES
                        ('Überschrift 2', 'lorem ipsum 2')
                    ;");
            $db->exec("
                    INSERT INTO forum (ueberschrift, content) VALUES
                        ('Überschrift 3', 'lorem ipsum 3')
                    ;");

            unset($db);
        } catch (PDOException $e) {
            // nothing
        }
    }
}
?>