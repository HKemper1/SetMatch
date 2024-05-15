<?php
session_start();
if (!isset($abs_path)) {
    require_once "path.php";
}
//Aufbereitung der Daten fuer die Ausgabe (View)
$ueberschrift = isset($_SESSION["ueberschrift"]) ? $_SESSION["ueberschrift"] : "";
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$text = isset($_SESSION["text"]) ? $_SESSION["text"] : "";
unset($_SESSION["ueberschrift"]);
unset($_SESSION["email"]);
unset($_SESSION["text"]);

require_once $abs_path . "/php/controller/Beitrag-anzeigen.php";
require_once $abs_path . "/php/controller/Index-controller.php";
require_once $abs_path . "/php/include/head.php";
?>
<body>
<?php
        require_once $abs_path . "/php/include/header.php";
?>
<main>
    <section>
        <form>
            <h1>Beitrag</h1>

            <h2>
                <?= htmlspecialchars($beitrag->getUeberschrift()) ?>
            </h2>

            <p>
                Von:
                <?= htmlspecialchars($beitrag->getEMail()) ?>
            </p>
            <p>
                <?= nl2br(htmlspecialchars($beitrag->getText())) ?>
            </p>
        </form>

        <form>

            <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "missing_required_parameters"): ?>
                <p>
                    Bitte alle erforderlichen Daten (Überschrift, E-Mail-Adresse) eingeben!
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "wrong_email"): ?>
                <p>
                    Bitte eine korrekte E-Mail-Adresse eingeben!
                </p>
            <?php endif; ?>
            <?php
            unset($_SESSION["message"]);
            ?>

            <h1>Neuer Beitrag</h1>

            <form action="php/controller/beitrag-neu-controller.php" method="post">

                Überschrift*:
                <input type="text" name="ueberschrift" value="<?= htmlspecialchars($ueberschrift) ?>" required>
                <br>
                E-Mail-Adresse*:
                <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
                <br>
                Text:
                <textarea cols="70" rows="10" name="text"><?= htmlspecialchars($text) ?></textarea>
                <br>
                <input type="submit" name="submit" value="eintragen">
            </form>

        <form>

            <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "missing_required_parameters"): ?>
                <p>
                    Bitte alle erforderlichen Daten (Überschrift, E-Mail-Adresse) eingeben!
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "wrong_email"): ?>
                <p>
                    Bitte eine korrekte E-Mail-Adresse eingeben!
                </p>
            <?php endif; ?>
            <?php
            unset($_SESSION["message"]);
            ?>

            <h1>Neuer Beitrag</h1>

            <form action="php/controller/beitrag-neu-controller.php" method="post">

                Überschrift*:
                <input type="text" name="ueberschrift" value="<?= htmlspecialchars($ueberschrift) ?>" required>
                <br>
                E-Mail-Adresse*:
                <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
                <br>
                Text:
                <textarea cols="70" rows="10" name="text"><?= htmlspecialchars($text) ?></textarea>
                <br>
                <input type="submit" name="submit" value="eintragen">
            </form>
        </form>
        <form>
            <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "invalid_entry_id"): ?>
                <p>
                    Der angegebene Beitragkann leider nicht gefunden werden.
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "internal_error"): ?>
                <p>
                    Es ist ein interner Fehler aufgetreten.
                    Bitte v <section>
                    <form>
                        <h1>Beitrag</h1>

                        <h2>
                            <?= htmlspecialchars($beitrag->getUeberschrift()) ?>
                        </h2>

                        <p>
                            Von:
                            <?= htmlspecialchars($beitrag->getEMail()) ?>
                        </p>
                        <p>
                            <?= nl2br(htmlspecialchars($beitrag->getText())) ?>
                        </p>
                    </form>

                    <form>

                        <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "missing_required_parameters"): ?>
                            <p>
                                Bitte alle erforderlichen Daten (Überschrift, E-Mail-Adresse) eingeben!
                            </p>
                        <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "wrong_email"): ?>
                            <p>
                                Bitte eine korrekte E-Mail-Adresse eingeben!
                            </p>
                        <?php endif; ?>
                        <?php
                        unset($_SESSION["message"]);
                        ?>

                        <h1>Neuer Beitrag</h1>

                        <form action="php/controller/beitrag-neu-controller.php" method="post">

                            Überschrift*:
                            <input type="text" name="ueberschrift" value="<?= htmlspecialchars($ueberschrift) ?>" required>
                            <br>
                            E-Mail-Adresse*:
                            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
                            <br>
                            Text:
                            <textarea cols="70" rows="10" name="text"><?= htmlspecialchars($text) ?></textarea>
                            <br>
                            <input type="submit" name="submit" value="eintragen">
                        </form>
                    </form>
                    <form>
                        <?php if (isset($_SESSION["message"]) && $_SESSION["message"] == "invalid_entry_id"): ?>
                            <p>
                                Der angegebene Beitragkann leider nicht gefunden werden.
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
                                Neuer Beitrag wurde hinzugefügt!
                            </p>
                        <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "delete_entry"): ?>
                            <p>
                                Beitrag wurde gelöscht!
                            </p>
                        <?php endif; ?>
                        <?php
                        unset($_SESSION["message"]);
                        ?>

                        <h1>Forum</h1>

                        <ul>
                            <?php if (empty($beitraege)): ?>
                                Keine Beiträge vorhanden.
                            <?php else:
                                foreach ($beitraege as $beitrag): ?>
                                    <li><a href="index.php?id=<?= urlencode($beitrag->getId()) ?>">
                                            <?= htmlspecialchars($beitrag->getUeberschrift()) ?>
                                        </a> |
                                        <a
                                                href="php/controller/Beitrag-loeschen.php?id=<?= urlencode($beitrag->getId()) ?>">löschen</a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </form>
                </section>
                ersuchen Sie es erneut oder kontaktieren Sie den Administrator.
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "missing_parameters"): ?>
                <p>
                    Fehler beim Aufruf der Seite: Es fehlen notwendige Parameter!
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "new_entry"): ?>
                <p>
                    Neuer Beitrag wurde hinzugefügt!
                </p>
            <?php elseif (isset($_SESSION["message"]) && $_SESSION["message"] == "delete_entry"): ?>
                <p>
                    Beitrag wurde gelöscht!
                </p>
            <?php endif; ?>
            <?php
            unset($_SESSION["message"]);
            ?>

            <h1>Forum</h1>

            <ul>
                <?php if (empty($beitraege)): ?>
                    Keine Beiträge vorhanden.
                <?php else:
                    foreach ($beitraege as $beitrag): ?>
                        <li><a href="index.php?id=<?= urlencode($beitrag->getId()) ?>">
                                <?= htmlspecialchars($beitrag->getUeberschrift()) ?>
                            </a> |
                            <a
                                    href="php/controller/Beitrag-loeschen.php?id=<?= urlencode($beitrag->getId()) ?>">löschen</a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </form>
    </section>
    <section class="iframe_tabelle">
        <iframe src="https://www.nwvv.de/cms/home/spielbetrieb/m_ligen/vl.xhtml?LeaguePresenter.view=resultTable&LeaguePresenter.matchSeriesId=36634909#samsCmsComponent_436163"
                width="25%" height="25%" allowfullscreen=""></iframe>
        <br>
    </section>

    <section class="box">
        <label>
            Hier werden die Testspielanfragen dargestellt.
            <br>
            <label>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </label>
            <br>
            <input type="submit" class="button" id="anfrage" name="anfrage" value="Anfrage stellen">
        </label>
    </section>

    <section class="team-box">

        <div class="team">
            <h2>Team Alpha</h2>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no
                sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>

        <div class="team">
            <h2>Team Beta</h2>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no
                sea takimata sanctus est Lorem ipsum dolor sit amet.
        </div>

        <div class="team">
            <h2>Team Omega</h2>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no
                sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>

        <div class="team">
            <h2>Team Delta</h2>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no
                sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>
        <div class="team">
            <h2>Team Gamma</h2>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no
                sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>
        <div class="team">
            <h2>Team Sigma</h2>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no
                sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>

        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
        </div>
    </section>

    <div class="beitrag">
        <h2>Neuer Beitrag</h2>
        <label for="text"></label><textarea id="text" name="text" cols="100" rows="10"
                                            maxlength="1000"></textarea>
        <input type="submit" class="button" id="beitrag" name="beitrag" value="Veröffentlichen">
    </div>

</main>

<?php
include_once $abs_path . "/php/include/footer.php";
?>

</body>
</html>
