<?php
    if (!isset($abs_path)) {
        require_once "path.php";
    }
?>
<?php
    require_once $abs_path . "/php/include/head.php";
?>

<body>
    <?php
        require_once $abs_path . "/php/include/header.php";
    ?>
    <main>
        <div>

        <h1>Datenschutz</h1>

        <p class="normalerText">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
        sed diam nonumy eirmod tempor invidunt ut labore et dolore
        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
        dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
        voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
        dolor sit amet.
        </p>
        </div>
    </main>
    <?php 
        include_once $abs_path . "/php/include/footer.php";
    ?>

</body>

</html>