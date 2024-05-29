<?php
if (!isset($abs_path)) {
    require_once "path.php";
}
// Aufbereitung der Daten fuer die Ausgabe (View)
$ueberschrift = isset($_SESSION["ueberschrift"]) ? $_SESSION["ueberschrift"] : "";
$text = isset($_SESSION["text"]) ? $_SESSION["text"] : "";
unset($_SESSION["ueberschrift"]);
unset($_SESSION["text"]);
?>
<?php
require_once $abs_path . "/php/controller/index-controller.php";
?>
<?php
require_once $abs_path . "/php/include/head.php";
?>
<body>
<?php
        require_once $abs_path . "/php/include/header.php";
?>
<main>
    <section class="box">
            <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "invalid_entry_id"): ?>
                <p>
                    Der angegebene Gästebucheintrag kann leider nicht gefunden werden.
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "internal_error"): ?>
                <p>
                    Es ist ein interner Fehler aufgetreten.
                    Bitte versuchen Sie es erneut oder kontaktieren Sie den Administrator.
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "missing_parameters"): ?>
                <p>
                    Fehler beim Aufruf der Seite: Es fehlen notwendige Parameter!
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "new_entry"): ?>
                <p>
                    Neuer Eintrag wurde hinzugefügt!
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "delete_entry"): ?>
                <p>
                    Eintrag wurde gelöscht!
                </p>
            <?php endif; ?>
            <?php
            unset($_SESSION["message"]);
            ?>

            <h1>Spiel Anfragen</h1>

            <ul>
                <?php if (empty($eintraege)): ?>
                    Keine Einträge vorhanden.
                <?php else:
                    foreach ($eintraege as $eintrag): ?>
                        <li><a href="eintrag-anzeigen.php?id=<?= urlencode($eintrag->getId()) ?>">
                                <?= htmlspecialchars($eintrag->getUeberschrift()) ?>
                            </a> |
                            <a
                                    href="php/controller/eintrag-loeschen-controller.php?id=<?= urlencode($eintrag->getId()) ?>">löschen</a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
    </section>
    <section class="box">

        <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "missing_required_parameters"): ?>
            <p>
                Bitte alle erforderlichen Daten (Überschrift) eingeben!
            </p>
        <?php endif; ?>
        <?php
        unset($_SESSION["message"]);
        ?>

        <h1>Neue Anfrage</h1>

        <form action="php/controller/eintrag-neu-controller.php" method="post">

            <h2>Überschrift</h2>
            <input type="text" name="ueberschrift" value="<?= htmlspecialchars($ueberschrift) ?>" required>
            <br>
            <h2>Beitragstext</h2>
            <textarea class="textbox" cols="70" rows="10" name="text"><?= htmlspecialchars($text) ?></textarea>
            <br>
            <input type="submit" name="submit" value="Veröffentlichen">
        </form>


    </section>
</main>

<?php
include_once $abs_path . "/php/include/footer.php";
?>

</body>
</html>
