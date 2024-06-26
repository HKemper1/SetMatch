<?php
require_once 'php/controller/update-team.php';
?>

<?php require_once $abs_path . "/php/include/head.php"; ?>
<body>
<?php require_once $abs_path . "/php/include/header.php"; ?>
<main>
    <div class="teamInfo">
        <div class="img-container">
            <img id="previewImage" class="rund" src="<?= $user['bild'] ? 'uploads/' . htmlspecialchars($user['bild']) : 'images/teamseite/placeholder.jpg' ?>" alt="Mannschaftsbild">
        </div>
        <div>
            <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
                <div>
                    <label for="bild">Profilbild hochladen:</label>
                    <input type="file" id="bild" name="bild" accept="image/*" onchange="previewImage(event)">
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

                                <label for="spieler_bild_<?= $index ?>">Bild hochladen:</label>
                                <input type="file" id="spieler_bild_<?= $index ?>" name="spieler_bild_<?= $index ?>" accept="image/*" onchange="previewSpielerBild(event, <?= $index ?>)">

                                <img id="previewSpielerBild_<?= $index ?>" src="<?= !empty($s['bild']) ? 'uploads/' . htmlspecialchars($s['bild']) : '' ?>" alt="Spielerbild" width="100">

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

<script>
    // JavaScript-Klasse für die Spieler-Verwaltung
    class Spieler {
        constructor() {
            this.init();
        }

        init() {
            document.getElementById('addSpielerButton').addEventListener('click', this.addSpieler.bind(this));
            document.getElementById('spielerContainer').addEventListener('click', this.handleSpielerDelete.bind(this));
            document.querySelectorAll('input[type="text"], textarea').forEach(input => {
                input.addEventListener('input', this.handleInput.bind(this));
            });
        }

        addSpieler() {
            const container = document.getElementById('spielerContainer');
            const index = container.children.length;

            const div = document.createElement('div');
            div.className = 'spieler';

            div.innerHTML = `
                <label for="spieler_name_${index}">Name:</label>
                <input type="text" id="spieler_name_${index}" name="spieler[${index}][name]">

                <label for="spieler_bild_${index}">Bild hochladen:</label>
                <input type="file" id="spieler_bild_${index}" name="spieler_bild_${index}" accept="image/*" onchange="previewSpielerBild(event, ${index})">

                <img id="previewSpielerBild_${index}" src="" alt="Vorschau" style="max-width: 100px; display: block; margin-top: 10px;">

                <button type="button" class="deleteSpielerButton">Löschen</button>
            `;

            container.appendChild(div);
        }

        handleSpielerDelete(event) {
            if (event.target.classList.contains('deleteSpielerButton')) {
                const div = event.target.closest('.spieler');
                if (div) {
                    div.remove(); // DOM-Element aus dem Container entfernen
                    this.saveData();
                }
            }
        }

        handleInput(event) {
            this.saveData();
        }

        saveData() {
            console.log('Daten gespeichert!');
        }
    }

    new Spieler();

    // JavaScript für die Vorschau des Profilbilds
    function previewImage(event) {
        const preview = document.getElementById('previewImage');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.onload = function() {
            URL.revokeObjectURL(preview.src); // Freigabe des Objekt-URLs zur Speicherplatzoptimierung
        };
    }

    // JavaScript für die Vorschau des Spielerbilds
    function previewSpielerBild(event, index) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const previewImg = document.getElementById(`previewSpielerBild_${index}`);
            if (previewImg) {
                previewImg.src = e.target.result;
            }
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

</body>
</html>
