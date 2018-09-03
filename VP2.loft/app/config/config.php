<?php
define("HOST", "http://" . $_SERVER["HTTP_HOST"] . "/");
define('ROOT', $_SERVER["DOCUMENT_ROOT"] . "/");
define('APP', ROOT . 'app/');
define('CONFIG', APP . 'config/');
define('PUB', ROOT . 'public/');
define('CORE', APP . 'core/');
define("VIEWS", PUB . 'views/');
define('CONTROLLERS', APP . 'controllers/');
define('ERRORS', APP . 'errors/');
define('MODELS', APP . 'models/');
