<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

require_once __DIR__ . '/controllers/HomeController.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$controller = new HomeController();
switch ($page) {
    case 'monitor':
        // Jika URL yang diakses adalah /?page=monitor, maka panggil fungsi monitor()
        $controller->monitor();
        break;
        
    case 'home':
    default:
        // Jika URL normal (tanpa embel-embel) atau parameter tidak dikenal, panggil fungsi index() untuk halaman portofolio utama
        $controller->index();
        break;
}
?>