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
    <section class="box">
        <iframe src="https://www.nwvv.de/cms/home/spielbetrieb/m_ligen/vl.xhtml?LeaguePresenter.view=resultTable&LeaguePresenter.matchSeriesId=36634909#samsCmsComponent_436163"
                width="100%" height="450" style="border:0;" allowfullscreen=""></iframe>
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

    <section class="box">
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
            <h2>Team Beta</h2>
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
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
        </div>

        <div>
            <h2>Neuer Beitrag</h2>
            <h4>Beschreibung:</h4>
            <label for="text"></label><textarea id="text" name="text" cols="100" rows="10"
                                                maxlength="1000"></textarea>

            <input type="submit" class="button" id="beitrag" name="beitrag" value="Veröffentlichen">
            <form action="post_message.php" method="POST">
                <label for="message">Neue Nachricht:</label><br>
                <textarea id="message" name="message" cols="50" rows="3"></textarea><br>
                <input type="submit" value="Nachricht posten">
            </form>
        </div>
    </section>
</main>

<?php
include_once $abs_path . "/php/include/footer.php";
?>

</body>
</html>
