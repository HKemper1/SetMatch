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
    <section>
        <label>
            Hier werden die Testspielanfragen dargestellt.
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
            <input type="submit" class="button" id="anfrage" name="anfrage" value="Anfrage stellen">
        </label>
    </section>

    <section>
        <div>
            <h1>Öffentliche Beiträge</h1>
        </div>


        <div>

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

        <div>
            <h2 class="großerText">Team Beta</h2>
            <p class="normalerText">
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

        <div>
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
        <div>
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
        </div>

        <div>
            <h2>Neuer Beitrag</h2>
            <h4>Beschreibung:</h4>
            <label for="text"></label><textarea class="textbox" id="text" name="text" cols="100" rows="10"
                                                maxlength="1000"></textarea>
            <input type="submit" class="button" id="beitrag" name="beitrag" value="Veröffentlichen">
        </div>
    </section>
</main>

<?php
include_once $abs_path . "/php/include/footer.php";
?>

</body>
</html>
