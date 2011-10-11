<?php
// Konfiguration einbinden
include ("config.php");
// unsere Klassen einbinden
include (MVC . "maincontroller.php");

// Laden des Inhalts
new MainController();

// Testausgabe
echo "<br><br>";
print_r(array_merge($_GET, $_POST));
echo "<br><br>";
echo $GLOBALS['dp'];
