<?php include_once "php/head.php" ?>

<body>
<h2>Registrierung</h2>

<form>
  <div>
    <label for="teamname">Teamname</label>
    <div>
      <input type="text" id="teamname" name="teamname" maxlength="100" required>
    </div>
  </div>
  <div>
    <label for="email">E-Mail</label>
    <div>
      <input type="email" id="email" name="email" maxlength="100" required>
    </div>
  </div>

  <div>
    <label for="password">Kennwort</label>
    <div>
      <input type="password" id="password" name="password" minlength="8" maxlength="100" required>
    </div>
  </div>

  <div>
    <label for="password_repeat">Kennwort wiederholen:</label>
    <div>
      <input type="password" id="password_repeat" name="password_repeat" minlength="8" maxlength="100"
             required>
    </div>
  </div>

  <div>
    <a href="anmeldung.php" class="button">Anmeldung</a>
    <button type="submit">Registrieren</button>
  </div>
</form>
</body>
</html>