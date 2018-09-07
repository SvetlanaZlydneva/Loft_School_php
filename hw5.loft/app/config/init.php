<?php
ob_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/config/config.php";
require_once ROOT . "vendor/autoload.php";
require_once CONFIG . "Eloquent.php";
require_once CORE . "Swift.php";
require_once CORE . "View.php";
require_once CORE . "router.php";
