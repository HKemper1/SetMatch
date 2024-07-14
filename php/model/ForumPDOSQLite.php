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
            if (!$command->execute([":ueberschrift" => htmlspecialchars($ueberschrift, ENT_QUOTES, 'UTF-8'), ":content" => htmlspecialchars($text, ENT_QUOTES, 'UTF-8')])) {
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
            if (!$command->execute([":id" => intval($id)])) {
                throw new InternerFehlerException();
            }
            $result = $command->fetchAll();
            if (empty($result)) {
                throw new FehlenderEintragException();
            }
            $entry = $result[0];
            return new Eintrag($entry["id"], htmlspecialchars($entry["ueberschrift"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($entry["content"], ENT_QUOTES, 'UTF-8'));
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
            if (!$command->execute([":id" => intval($id)])) {
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
            if (!$command->execute([":id" => intval($id)])) {
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
                $entry = new Eintrag($row["id"], htmlspecialchars($row["ueberschrift"], ENT_QUOTES, 'UTF-8'), htmlspecialchars($row["content"], ENT_QUOTES, 'UTF-8'));
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
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO comments (entry_id, comment_text, created_at) VALUES (:entry_id, :comment_text, :created_at)";
            $command = $db->prepare($sql);
            if (!$command) {
                throw new InternerFehlerException("Fehler bei der Vorbereitung der SQL-Anweisung.");
            }

            $currentTime = date('Y-m-d H:i:s');
            $params = [
                ":entry_id" => intval($entryId),
                ":comment_text" => htmlspecialchars($commentText, ENT_QUOTES, 'UTF-8'),
                ":created_at" => $currentTime
            ];

            if (!$command->execute($params)) {
                throw new InternerFehlerException("Fehler beim Ausführen der SQL-Anweisung.");
            }

            return intval($db->lastInsertId());
        } catch (PDOException $exc) {
            throw new InternerFehlerException("PDOException: " . $exc->getMessage());
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
            if (!$command->execute([":entry_id" => intval($entryId)])) {
                throw new InternerFehlerException();
            }
            $comments = $command->fetchAll(PDO::FETCH_ASSOC);
            foreach ($comments as &$comment) {
                $comment['comment_text'] = htmlspecialchars($comment['comment_text'], ENT_QUOTES, 'UTF-8');
            }
            return $comments;
        } catch (PDOException $exc) {
            throw new InternerFehlerException($exc->getMessage());
        }
    }

    private function getConnection()
    {
        global $abs_path;
        $dbPath = realpath($abs_path . "/db/forum.db");
        if (!file_exists($dbPath)) {
            $this->anlegen();
        }

        try {
            $user = null;
            $pw = null;
            $dsn = 'sqlite:' . $dbPath;

            $db = new PDO($dsn, $user, $pw);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $e) {
            throw new InternerFehlerException("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
        }
    }

    private function anlegen()
    {
        global $abs_path;
        $dbPath = realpath($abs_path . '/db/forum.db');
        try {
            $user = null;
            $pw = null;
            $dsn = 'sqlite:' . $dbPath;
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
