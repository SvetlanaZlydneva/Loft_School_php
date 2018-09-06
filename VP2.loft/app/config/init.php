<?php
if (!isset($_SESSION['idUser'])) {
    session_start();
}
ob_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/config/config.php";
require_once APP . "fakers/FakerUsers.php";
require_once APP . "fakers/FakerFiles.php";
require_once ROOT . "vendor/autoload.php";
require_once CONFIG . "Eloquent.php";
require_once CORE . "View.php";
require_once CORE . "router.php";
