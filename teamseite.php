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
    
    <div class="teamInfo">
        <div class="unsereStaerken">
            <img src="images/teamseite/starspieler.png"
                        alt="Starspieler"
                        width="64"
		                height="64">
            <label>Starspieler</label>
            <section>
                <div class="star">
                    <div>
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    </div>
                    <label>Angriff</label>
                </div> 
                <div  class="star">  
                    <div>
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    </div>
                    <label>Verteidigung</label>  
                </div>
                <div class="star">
                    <div >
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    </div>
                    <label>Organisation</label>
                </div>
                <div class="star">
                    <div >
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                        <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                     <img src="images/teamseite/stern.png" alt="Stern" width="24" height="24">
                    </div>
                    <label>Zuverlässigkeit</label>
                </div>
            </section>
        </div>
    </div>
    <div class="teamInfo">
    <section class="anfrageContainer">
                <label>
                    <h2>Du möchtest gegen uns Spielen</h2>
                    <input type="submit" class="button" id="anfrage" name="anfrage" value="Anfrage stellen">
                </label>
            </section>
    </div>
    
</main>
<?php
include_once $abs_path . "/php/include/footer.php";
?>
</body>
</html>