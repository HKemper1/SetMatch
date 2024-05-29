<?php
if (!isset($abs_path)) {
    require_once "path.php";
}
require_once $abs_path . "/php/controller/eintrag-anzeigen-controller.php";
?>

<?php
require_once $abs_path . "/php/include/head.php";
?>

<body>
    <?php
    require_once $abs_path . "/php/include/header.php";
    ?>
    <main>

        <h1>Beitrag</h1>

        <h2>
            <?= htmlspecialchars($eintrag->getUeberschrift()) ?>
        </h2>

        <p>
            <?= nl2br(htmlspecialchars($eintrag->getText())) ?>
        </p>

    </main>
</body>

</html>