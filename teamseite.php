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
                    <textarea id="beschreibung" name="beschreibung"><?= htmlspecialchars($user['beschreibung']) ?></textarea>
                </div>
                <div>
                    <h2>Spieler</h2>
                    <div id="spielerContainer" class="grid-container">
                        <?php foreach ($spieler as $index => $s): ?>
                            <div class="spieler">
                                <label for="spieler_name_<?= $index ?>">Name:</label>
                                <input type="text" id="spieler_name_<?= $index ?>" name="spieler[<?= $index ?>][name]" value="<?= htmlspecialchars($s['name']) ?>">

                                <label for="spieler_bild_<?= $index ?>">Bild hochladen:</label>
                                <input type="file" id="spieler_bild_<?= $index ?>" name="spieler_bild_<?= $index ?>" accept="image/*" onchange="previewSpielerBild(event, <?= $index ?>)">

                                <img id="previewSpielerBild_<?= $index ?>" src="<?= !empty($s['bild']) ? 'uploads/' . htmlspecialchars($s['bild']) : 'images/teamseite/placeholder.jpg' ?>" alt="Spielerbild">

                                <button type="button" class="deleteSpielerButton">Löschen</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" id="addSpielerButton">Spieler hinzufügen</button>
                </div>
                <br>
                <input type="submit" value="Speichern">
            </form>
        </div>
    </div>
</main>
<?php include_once $abs_path . "/php/include/footer.php"; ?>

<style>
    .rund {
        border-radius: 200px;
        -moz-border-radius: 200px;
        -webkit-border-radius: 200px;
        transform: scale(0.2);
    }

    .img-container {
        width: 300px;
        height: 300px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-bottom: 20px;
    }

    .teamInfo {
        margin: 10px;
        padding: 10px;
        background-color: white;
        border-radius: 25px;
        border: 2px solid black;
        display: flex;
        flex-direction:column;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);

        max-width: 1000px;
    }

    .anfrageContainer {
        display: flex;
        flex-direction: column; /* Elemente vertikal anordnen */
        align-items:center; /* Elemente horizontal zentrieren */
    }

    .anfrageContainer input {
        margin-left: 100px;
        margin-bottom: 25px;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }


    .img-container img {
        border-radius: 150%;
        max-width: 4000px;
    }

    form {
        width: 150%;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input[type="text"], input[type="file"], textarea {
        width: 90%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    textarea {
        height: 100px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .spieler {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        background: #fafafa;
        text-align: center;
    }

    .spieler img {
        display: block;
        margin: 10px auto;
        max-width: 200px;
        border-radius: 200px;
    }

    .deleteSpielerButton {
        background: #e74c3c;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #addSpielerButton, input[type="submit"] {
        background: #3498db;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    #addSpielerButton {
        margin-top: 10px;
        display: block;
    }

    .anfrageContainer h2 {
        margin-bottom: 10px;
    }

    .button {
        background: #2ecc71;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<script src = "js/team.js"></script>
</body>
</html>
