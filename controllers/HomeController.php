<?php
// Panggil file konfigurasi dan model yang dibutuhkan
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/StatModel.php';

class HomeController {
    public function index() {
        // 1. Inisialisasi koneksi ke Database
        $database = new Database();
        $db = $database->getConnection();

        // 2. Panggil Model untuk urusan statistik
        $statModel = new StatModel($db);
        
        // 3. Jalankan logika penghitung jumlah view
        $statModel->addPageView();
        $totalViews = $statModel->getTotalViews();

        // 4. Data Project Portofolio
        $projects = [
            
            [
                "title" => "Web Profil Pesantren",
                "desc" => "Website Profil pondok pesantren menggunakan PHP Native.",
                "img" => "https://raw.githubusercontent.com/Muhsin-IT/comen/refs/heads/main/image%20(1).webp",
                "demo_link" => "https://almiftah.web.id",
                "github_link" => "https://github.com/Muhsin-IT/profil-ponpes"
            ],
            [
                "title" => "Sistem Tarhim dan Bel | IoT",
                "desc" => "Pemutar tarhim dan bel terjadwal otomatis menggunakan mikrokontroler ESP32, DFPlayer Mini, dan modul relay.",
                "img" => "https://github.com/Muhsin-IT/Auto-Tarhim-dan-Bel--NodeMcu-V3-/raw/main/Diagram-Auto-Tarhim-Esp-By-Muhsin-It.png",
                "demo_link" => "#", 
                "github_link" => "https://github.com/Muhsin-IT/Auto-Tarhim-dan-Bel--NodeMcu-V3"
            ],
            [
                "title" => "Platform Streaming ilegal \"Anisora\"",
                "desc" => "Pengembangan antarmuka dan platform website untuk streaming tayangan anime secara online.",
                "img" => "https://raw.githubusercontent.com/Muhsin-IT/comen/refs/heads/main/image.webp",
                "demo_link" => "https://anisora.web.id/",
                "github_link" => "https://github.com/Muhsin-IT/web-streaming-downloader"
            ],
            [
                "title" => "Sistem Rekomendasi Kost",
                "desc" => "Sistem rekomendasi kost mahasiswa berbasis web menggunakan metodologi Design Science Research.",
                "img" => "https://github.com/Muhsin-IT/Sistem-Rekomendasi-Kost/raw/main/Tampilan-Web-RadenStay.jpeg",
                "demo_link" => "#",
                "github_link" => "https://github.com/Muhsin-IT/Sistem-Rekomendasi-Kost"
            ],
            [
                "title" => "Setup Event & Live Streaming",
                "desc" => "Menangani berbagai keperluan teknis event, termasuk instalasi Sound System, Setup Live Streaming, dan manajemen Proyektor Video Mapping untuk berbagai skala acara.",
                "img" => "https://raw.githubusercontent.com/Muhsin-IT/comen/refs/heads/main/Livestreaming%20event.webp",
                "demo_link" => "#",
                "github_link" => "#"
            ]
        ];

        // 5. Kirim semua data di atas ke file View
        require_once __DIR__ . '/../views/home.php';
    }
}
?>