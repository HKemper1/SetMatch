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
            <h2> Hier werden die Testspielanfragen dargestellt.</h2>
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

    <img src="images/teamseite/teambild.png" alt="Mannschaftsbild">
        <br>
        <div>
            <label>
                Hier stehen Manschaftsinformationen <br>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </label>
        </div>
        <div>
            <label>
                Starspieler <br>
                <img src="images/teamseite/starspieler.png"
                     srcset="logo-160x160 2x"
                     alt="Starspieler"
                     width="64"
		             height="64">
            </label>
        </div>
    </section>
    <section class="box">
        <div class="rating">
            <div class="stars">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
            </div>
        <label>Angriff</label>
        </div>   
             <div class="rating">
                <div class="stars">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                </div>
            <label>Verteidigung</label>
        </div>
                
        <div class="rating">
            <div class="stars">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
            </div>
                <label>Organisation</label>
            </div>
            
            <div class="rating">
                <div class="stars">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                </div>
                <label>Zuverlässigkeit</label>
            </div>
        </div>
    </section>

    <section class="box">

        <div>
            <label>
                Spielfeld
            </label>
            <br>
            <img src="images/teamseite/spieler.png" alt="Außen" width="40" height="40">
            <img src="images/teamseite/spieler.png" alt="Mitte" width="40" height="40">
            <img src="images/teamseite/spieler.png" alt="Zuspieler" width="40" height="40">
            <br>
            <img src="images/teamseite/spieler.png" alt="Außen" width="40" height="40">
            <img src="images/teamseite/spieler.png" alt="Libero" width="40" height="40">
            <img src="images/teamseite/spieler.png" alt="Diagonal" width="40" height="40">
            <br>
            <img src="images/teamseite/spieler.png" alt="Trainer" width="40" height="40">
        </div>
    </section>

</main>
<?php
include_once $abs_path . "/php/include/footer.php";
?>
</body>
</html>