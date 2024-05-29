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
    <div class="teamInfo">
        <div class="img-container">
            <img  class="rund" src="images/teamseite/teambild.png" alt="Mannschaftsbild">
        </div>
        <h2>Unser Team</h2>
        <label class="normalerText">
        Unser Volleyballteam ist eine engagierte und dynamische Gruppe von Sportlerinnen und Sportlern, die durch ihre Leidenschaft für das Spiel und ihren Teamgeist hervorsticht. Wir trainieren regelmäßig, um unsere Fähigkeiten zu verbessern und auf dem Spielfeld unser Bestes zu geben. Unser Team zeichnet sich durch eine starke Gemeinschaft und gegenseitige Unterstützung aus, sowohl im Training als auch bei Wettkämpfen. Jedes Mitglied bringt seine individuellen Stärken ein, was uns als Einheit noch stärker macht. Mit unserem unermüdlichen Einsatz und unserer positiven Einstellung streben wir danach, jede Herausforderung zu meistern und gemeinsam Erfolge zu feiern.
        </label>
    </div>
        
    </section>
    <div class="unsereStaerken">
        <div>
            <label>
                <p class="kleinerText">Starspieler</p>
                <img src="images/teamseite/starspieler.png"
                     srcset="logo-160x160 2x"
                     alt="Starspieler"
                     width="64"
		             height="64">
            </label>

            <section>
            <div>
                <div>
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                </div>
                <p class="kleinerText">Angriff</p>
            </div>   
            <div>
                <div>
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                </div>
                <label>Verteidigung</label>
            </div>
                
            <div>
                <div>
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                </div>
                    <label>Organisation</label>
                </div>
            
                <div>
                    <div>
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
            <section>
            <label>
                <h2>Du möchtest gegen uns Spielen</h2>
                <input type="submit" class="button" id="anfrage" name="anfrage" value="Anfrage stellen">
            </label>
        </section>
        </div>
    </div>
    

    <section>

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