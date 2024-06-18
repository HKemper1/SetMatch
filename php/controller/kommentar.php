<?php
class Kommentar {
    private $id;
    private $entryId;
    private $commentText;
    private $createdAt;

    public function __construct($id, $entryId, $commentText, $createdAt) {
        $this->id = $id;
        $this->entryId = $entryId;
        $this->commentText = $commentText;
        $this->createdAt = $createdAt;
    }

    public function getId() {
        return $this->id;
    }

    public function getEntryId() {
        return $this->entryId;
    }

    public function getCommentText() {
        return $this->commentText;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }
}
?>
