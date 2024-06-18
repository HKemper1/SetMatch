<?php
require_once 'php/controller/update-team.php';
?>

<?php require_once $abs_path . "/php/include/head.php"; ?>

<body>
<?php require_once $abs_path . "/php/include/header.php"; ?>

<main>
    <div class="teamInfo">
        <div class="img-container">
            <!-- Hier wird die Vorschau des Profilbilds angezeigt -->
            <img id="previewImage" class="rund" src="<?= $user['bild'] ? 'uploads/' . htmlspecialchars($user['bild']) : 'images/teamseite/placeholder.jpg' ?>" alt="Mannschaftsbild">
        </div>
        <div>
            <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
                <div>
                    <label for="bild">Profilbild hochladen:</label>
                    <!-- Hier wird das Datei-Input-Feld für den Bild-Upload mit Drag-and-Drop-Funktionalität hinzugefügt -->
                    <input type="file" id="bild" name="bild" accept="image/*" onchange="previewImage(event)" style="display: none;">
                    <label for="bild" id="uploadLabel">Klicken oder Drag & Drop</label>
                    <input type="hidden" name="current_bild" value="<?= htmlspecialchars($user['bild']) ?>">
                </div>
                <div>
                    <h2>Unser Team</h2>
                    <label for="teamname">Teamname:</label>
                    <input type="text" id="teamname" name="teamname" value="<?= htmlspecialchars($user['teamname']) ?>" readonly>
                </div>
                <div>
                    <h3>Beschreibung</h3>
                    <label for="beschreibung">Beschreibung:</label>
                    <textarea id="beschreibung" name="beschreibung"><?= htmlspecialchars($user['beschreibung']) ?></textarea>
                </div>
                <div>
                    <h2>Spieler</h2>
                    <div id="spielerContainer">
                        <?php foreach ($spieler as $index => $s): ?>
                            <div class="spieler">
                                <label for="spieler_name_<?= $index ?>">Name:</label>
                                <input type="text" id="spieler_name_<?= $index ?>" name="spieler[<?= $index ?>][name]" value="<?= htmlspecialchars($s['name']) ?>">
                                <label for="spieler_bild_<?= $index ?>">Bild:</label>
                                <!-- Hier wird das Datei-Input-Feld für den Spielerbild-Upload mit Drag-and-Drop-Funktionalität hinzugefügt -->
                                <input type="file" id="spieler_bild_<?= $index ?>" name="spieler_bild_<?= $index ?>" accept="image/*" onchange="previewSpielerBild(event, <?= $index ?>)" style="display: none;">
                                <label for="spieler_bild_<?= $index ?>" class="uploadLabel">Klicken oder Drag & Drop.</label>
                                <?php if (!empty($s['bild'])): ?>
                                    <img id="previewSpielerBild_<?= $index ?>" src="uploads/<?= htmlspecialchars($s['bild']) ?>" alt="Spielerbild" width="100">
                                <?php endif; ?>
                                <button type="button" class="deleteSpielerButton">Löschen</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" id="addSpielerButton">Spieler hinzufügen</button>
                </div>
                <input type="submit" value="Speichern">
            </form>
        </div>
    </div>
    <div class="teamInfo">
        <section class="anfrageContainer">
            <label>
                <h2>Du möchtest gegen uns spielen?</h2>
                <input type="submit" class="button" id="anfrage" name="anfrage" value="Anfrage stellen">
            </label>
        </section>
    </div>
</main>
<?php include_once $abs_path . "/php/include/footer.php"; ?>
<script src= "/js/vorschau.js"> </script>
 <script src= "/js/spieler.js"> </script>
</body>
</html>