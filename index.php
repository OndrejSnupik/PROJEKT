<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BeFit.</title>
</head>
<body>
    <header>
        <a href="index.php" class="home-link">
            <h1>Maturitní projekt</h1>
        </a>
    </header>
    <a href="login.php" class="login-btn">Přihlásit se</a>
    <a href="bmi.php" class="bmi-btn">BMI Kalkukačka</a>
    <img class="kostra" src="kostra.svg" usemap="#image_map">
        <map name="image_map">
            <area alt="Prsa" title="Prsa" href="prsa.php" coords="202,150 223,229 320,231 342,153 274,162 " shape="polygon">
            <area alt="Břicho" title="Břicho" href="bricho.php" coords="215,240 326,239 316,337 229,338 " shape="polygon">
            <area alt="Nohy" title="Nohy" href="nohy.php" coords="211,360 329,358 351,611 270,391 200,615 " shape="polygon">
            <area alt="Ruce" title="Ruce" href="ruce.php" coords="179,176 208,209 174,347 156,345 " shape="polygon">
            <area alt="Ruce" title="Ruce" href="ruce.php" coords="351,160 334,209 368,346 385,298 " shape="polygon">
        </map>

<?php 
    session_start();

	include("connection.php");
	include("functions.php");

?>
</body>
</html>