<?php
session_start();

if (!isset($abs_path)) {
    require_once "path.php";
}

$ueberschrift = isset($_SESSION["ueberschrift"]) ? $_SESSION["ueberschrift"] : "";
$text = isset($_SESSION["text"]) ? $_SESSION["text"] : "";
unset($_SESSION["ueberschrift"]);
unset($_SESSION["text"]);


require_once $abs_path . "/php/controller/index-controller.php";
?>

<?php require_once $abs_path . "/php/include/head.php"; ?>

<body>

<?php require_once $abs_path . "/php/include/header.php"; ?>

<main>

    <section class="anmContainer anmBody">
        <?php if(isset($_SESSION['teamname'])): ?>
            <h1>Willkommen, <?php echo htmlspecialchars($_SESSION['teamname']); ?>!</h1>
        <?php else: ?>
            <h1>Willkommen!</h1>
            <p>Sie sind nicht angemeldet.</p>
        <?php endif; ?>
        <h1>Team-Suche</h1>
        <form id="searchForm">
            <label for="searchInput">Suchbegriff:</label>
            <input type="text" id="searchInput" name="searchInput">
            <button type="submit">Suchen</button>
        </form>
        <div id="searchResults"></div>
    </section>

    <section class="anmContainer anmBody">
        <?php if (isset($_SESSION["message"])): ?>
            <?php if ($_SESSION["message"] == "invalid_entry_id"): ?>
                <p>Der angegebene Gästebucheintrag kann leider nicht gefunden werden.</p>
            <?php elseif ($_SESSION["message"] == "internal_error"): ?>
                <p>Es ist ein interner Fehler aufgetreten. Bitte versuchen Sie es erneut oder kontaktieren Sie den Administrator.</p>
            <?php elseif ($_SESSION["message"] == "missing_parameters"): ?>
                <p>Fehler beim Aufruf der Seite: Es fehlen notwendige Parameter!</p>
            <?php elseif ($_SESSION["message"] == "new_entry"): ?>
                <p>Neuer Eintrag wurde hinzugefügt!</p>
            <?php elseif ($_SESSION["message"] == "delete_entry"): ?>
                <p>Eintrag wurde gelöscht!</p>
            <?php endif; ?>
            <?php unset($_SESSION["message"]); ?>
        <?php endif; ?>

        <h1>Spiel Anfragen</h1>
        <div class="spaContainer">
            <?php if (empty($eintraege)): ?>
                <div>Keine Einträge vorhanden.</div>
            <?php else:
                foreach ($eintraege as $eintrag): ?>
                    <div class="spaPost-block" data-entry-id="<?= htmlspecialchars($eintrag->getId()) ?>">
                        <div class="spaPost-header"><?= htmlspecialchars($eintrag->getUeberschrift()) ?></div>
                        <div class="spaPost-content"><?= nl2br(htmlspecialchars($eintrag->getText())) ?></div>
                        <div class="spaPost-actions">
                            <a href="eintrag-anzeigen.php?id=<?= urlencode($eintrag->getId()) ?>">Anzeigen</a>
                            <a href="php/controller/eintrag-loeschen-controller.php?id=<?= urlencode($eintrag->getId()) ?>">Löschen</a>
                        </div>
                        <div class="comments-section">
                            <div class="comments-list"></div>
                            <textarea class="new-comment" placeholder="Kommentar hinzufügen..."></textarea>
                            <button class="add-comment">Kommentar hinzufügen</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="anmContainer anmBody">
        <?php if (!isset($_SESSION['teamname'])): ?>
            <p>Sie müssen angemeldet sein, um einen Beitrag zu erstellen.</p>
        <?php else: ?>
            <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "missing_required_parameters"): ?>
                <p>Bitte alle erforderlichen Daten (Überschrift) eingeben!</p>
            <?php endif; ?>
            <?php unset($_SESSION["message"]); ?>

            <h1>Neuer Beitrag</h1>

            <form class="chatContainer" action="php/controller/eintrag-neu-controller.php" method="post">
                <h2>Überschrift</h2>
                <input class="inputChat" type="text" name="ueberschrift" value="<?= htmlspecialchars($ueberschrift) ?>" required>
                <br>
                <h2>Text</h2>
                <textarea class="textbox" cols="70" rows="10" name="text"><?= htmlspecialchars($text) ?></textarea>
                <br>
                <input class="button" type="submit" name="submit" value="Beitrag erstellen">
            </form>
        <?php endif; ?>
    </section>

</main>

<?php include_once $abs_path . "/php/include/footer.php"; ?>
<script src="js/suche.js"></script>
<script src="js/kommentar.js"></script>
</body>
</html>
