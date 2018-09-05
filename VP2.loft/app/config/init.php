<?php
session_start();
ob_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/config/config.php";
require_once APP. "fakers/fakerUsers.php";
require_once APP. "fakers/fakerFiles.php";
require_once ROOT . "vendor/autoload.php";
require_once CONFIG . "eloquent.php";
require_once CORE . "view.php";
require_once CORE . "router.php";
