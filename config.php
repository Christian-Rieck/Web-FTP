<?php

// Pfade
define("DS", DIRECTORY_SEPARATOR);

define("PATH", dirname(__FILE__) . DS);
define("ROOT", "/~christian/_mvc_webftp/");

define("CONTROLLERS", PATH . "controllers" . DS);
define("MODELS", PATH . "models" . DS);
define("LAYOUTS", PATH . "layouts" . DS);
define("TEMPLATES", PATH . "templates" . DS);
define("INCLUDES", PATH . "includes" . DS);
define("CLASSES", PATH . "class" . DS);
define("MVC", PATH . "mvc" . DS);
define("RESOURCES", PATH . "resources" . DS);

// SQL-Server Parameter
define("SQL_SERVER", "localhost");
define("SQL_DATABASE", "webftp");
define("SQL_USER", "root");
define("SQL_PASSWORD", "root");

?>