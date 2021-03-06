<!DOCTYPE html>
<html>
<head>
	<title>Neflish</title>
	<meta charset="ISO-8859-1">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="icon" href="../img/NeflishLogo3.png">
	<script type="text/javascript" src="../js/login_register.js"></script>
</head>
<body>
	<section class="forms-section">
  <!--<h1 class="section-title">LOGEATU/ERREGISTRATU</h1>-->
  <div class="forms">
    <div class="form-wrapper is-active" id="divLog">
      <button type="button" class="switcher switcher-login" onclick="aldatuActiveLog()">
        Login
        <span class="underline"></span>
      </button>
			<!-- LOGIN formularioa -->
      <form class="form form-login" method="post" action="loginSignup.php">
        <fieldset>
          <legend>Mesedez, erabiltzailea eta pasahitza sar ezazu saioa hasteko.</legend>
          <div class="input-block">
            <label for="login-email">E-mail</label>
            <input id="login-email" name="login-email" type="email" required>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" name="login-password" type="password" required>
            <span id="ErabErr" style="display: none;"></span>
          </div>
        </fieldset>
        <button type="submit" class="btn-login">Logeatu</button>
      </form>
    </div>
		<!-- LOGIN formularioaren egiaztapena -->
    <?php include 'login.php'; ?>
    <div class="form-wrapper" id="divReg">
      <button type="button" class="switcher switcher-signup" onclick="aldatuActiveReg()">
        Sign Up
        <span class="underline"></span>
      </button>
			<!-- SIGNUP formularioa -->
      <form class="form form-signup" method="post" action="loginSignup.php">
        <fieldset>
          <legend>Mesedez, izen abizenak, erabiltzailea, emaila eta pasahitza bitan erregistratzeko.</legend>
          <div class="input-block">
            <label for="izen-abizenak">Izen Abizenak*</label>
            <input id="izen-abizenak" name="izen-abizenak" onblur="izenaEgiaztatu()" required>
            <span id="IzenErr">Izen Abizenak ez du formatu egokia</span>
          </div>
          <div class="input-block">
            <label for="signup-email">E-mail*</label>
            <input id="signup-email" name="signup-email" type="email" onblur="emailEgiaztatu()" pattern="/^[a-zA-Z0-9]{1,}\@[a-z]{2,}\.[a-z]{2,}$/" required>
            <span id="EmailErr" class="err">Emaila ez du formatu egokia</span>
          </div>
          <div class="input-block">
            <label for="signup-password">Pasahitza*</label>
            <input id="signup-password" name="signup-password" type="password" required>
          </div>
          <div class="input-block">
            <label for="signup-password-confirm">Pasahitza errepikatu*</label>
            <input id="signup-password-confirm" name="signup-password-confirm" type="password" onblur="pasahitzaEgiaztatu()"required>
            <span id="PasErr">Pasahitzak ez dira berdinkak</span>
          </div>
        </fieldset>
        <button type="submit" id="btn-signup" class="btn-signup">Erregistratu</button>
      </form>
    </div>
		<!-- SIGNUP formularioaren egiaztapena -->
    <?php include 'signup.php'; ?>
  </div>
</section>
</body>
</html>
