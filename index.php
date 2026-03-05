<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

require_once __DIR__ . '/controllers/HomeController.php';

// Cuma manggil controller aja
$controller = new HomeController();
$controller->index();
?>