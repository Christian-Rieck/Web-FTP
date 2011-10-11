<?php

// Pfade
define("DS", DIRECTORY_SEPARATOR);

define("PATH", dirname(__FILE__) . DS);
define("ROOT", DS . "" . DS);

define("CONTROLLERS", PATH . "controllers" . DS);
define("MODELS", PATH . "models" . DS);
define("LAYOUTS", PATH . "layouts" . DS);
define("TEMPLATES", PATH . "templates" . DS);
define("INCLUDES", PATH . "includes" . DS);
define("MVC", PATH . "mvc" . DS);

// SQL-Server Parameter
define("SQL_SERVER", "localhost");
define("SQL_DATABASE", "myBlog");
define("SQL_USER", "myBlog");
define("SQL_PASSWORD", "password");

?>