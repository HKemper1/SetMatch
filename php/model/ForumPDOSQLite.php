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
            throw new InternerFehlerException($exc->getMessage());
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
            throw new InternerFehlerException($exc->getMessage());
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
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            throw new InternerFehlerException($exc->getMessage());
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
            throw new InternerFehlerException($exc->getMessage());
        }
    }

    public function neuerKommentar($entryId, $commentText)
    {
        try {
            $db = $this->getConnection();
            $sql = "INSERT INTO comments (entry_id, comment_text, created_at) VALUES (:entry_id, :comment_text, :created_at)";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([
                ":entry_id" => $entryId,
                ":comment_text" => $commentText,
                ":created_at" => date('Y-m-d H:i:s')
            ])) {
                throw new InternerFehlerException();
            }
            return intval($db->lastInsertId());
        } catch (PDOException $exc) {
            throw new InternerFehlerException($exc->getMessage());
        }
    }

    public function getKommentare($entryId)
    {
        try {
            $db = $this->getConnection();
            $sql = "SELECT * FROM comments WHERE entry_id = :entry_id ORDER BY created_at DESC";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException();
            }
            if (!$command->execute([":entry_id" => $entryId])) {
                throw new InternerFehlerException();
            }
            return $command->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            throw new InternerFehlerException($exc->getMessage());
        }
    }

    private function getConnection()
    {
        global $abs_path;
        if (!file_exists($abs_path . "/db/forum.db")) {
            $this->anlegen();
        }

        try {
            $user = null; // SQLite benötigt keine Benutzerdaten
            $pw = null; // SQLite benötigt keine Passwörter
            $dsn = 'sqlite:' . $abs_path . '/db/forum.db';
            return new PDO($dsn, $user, $pw);
        } catch (PDOException $e) {
            throw new InternerFehlerException($e->getMessage());
        }
    }

    private function anlegen()
    {
        global $abs_path;
        try {
            $user = null; // SQLite benötigt keine Benutzerdaten
            $pw = null; // SQLite benötigt keine Passwörter
            $dsn = 'sqlite:' . $abs_path . '/db/forum.db';
            $db = new PDO($dsn, $user, $pw);

            $db->exec("
                CREATE TABLE IF NOT EXISTS forum (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    ueberschrift TEXT,
                    content TEXT
                );");
            $db->exec("
                CREATE TABLE IF NOT EXISTS comments (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    entry_id INTEGER NOT NULL,
                    comment_text TEXT,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY(entry_id) REFERENCES forum(id)
                );");

            $db->exec("
                INSERT INTO forum (ueberschrift, content) VALUES
                    ('Überschrift 1',  'Lorem ipsum 1')
                ;");
            $db->exec("
                INSERT INTO forum (ueberschrift, content) VALUES
                    ('Überschrift 2', 'Lorem ipsum 2')
                ;");
            $db->exec("
                INSERT INTO forum (ueberschrift, content) VALUES
                    ('Überschrift 3', 'Lorem ipsum 3')
                ;");

            unset($db);
        } catch (PDOException $e) {
            throw new InternerFehlerException($e->getMessage());
        }
    }
}
?>
