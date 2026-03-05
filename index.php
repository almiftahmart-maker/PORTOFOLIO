<?php

session_start();

// Konfigurasi Database (Sesuaikan dengan server Anda)
$host = '11.11.11.158';
$user = 'aapanel'; 
$pass = 'admin1973'; 
$db   = 'db_portofolio'; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Jakarta');

// ==========================================
// 1. LOGIKA TOTAL VIEWS
// ==========================================
// Gunakan session agar refresh halaman berkali-kali oleh user yang sama tidak dihitung sebagai view baru
if (!isset($_SESSION['has_visited'])) {
    $conn->query("UPDATE page_views SET total_views = total_views + 1 WHERE page_name = 'home'");
    $_SESSION['has_visited'] = true;
}

// Ambil angka Total Views saat ini
$result_views = $conn->query("SELECT total_views FROM page_views WHERE page_name = 'home'");
$total_views = ($result_views->num_rows > 0) ? $result_views->fetch_assoc()['total_views'] : 0;


// ==========================================
$projects = [
    [
        "title" => "Web Profil Pesantren",
        "desc" => "Website Profil pondok pesantren menggunakan PHP Native.",
        "img" => "https://raw.githubusercontent.com/Muhsin-IT/profil-ponpes/main/image.png",
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
        "title" => "Platform Streaming \"Anisora\"",
        "desc" => "Pengembangan antarmuka dan platform website untuk streaming tayangan anime secara online.",
        "img" => "https://raw.githubusercontent.com/Muhsin-IT/web-streaming-downloader/main/image.png",
        "demo_link" => "https://anisora.web.id/",
        "github_link" => "https://github.com/Muhsin-IT/web-streaming-downloader"
    ],
    [
        "title" => "Sistem Rekomendasi Kost",
        "desc" => "Sistem rekomendasi kost mahasiswa berbasis web menggunakan metodologi Design Science Research.",
        "img" => "https://github.com/Muhsin-IT/Sistem-Rekomendasi-Kost/raw/main/Tampilan-Web-RadenStay.jpeg",
        "demo_link" => "#",
        "github_link" => "https://github.com/Muhsin-IT/Sistem-Rekomendasi-Kost"
    ]
];
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Portofolio | Muhammad Muhsin - Web & IoT Developer</title>
    <meta name="description" content="Portofolio resmi Muhammad Muhsin, seorang Web & IoT Developer, serta IT Enthusiast yang berpengalaman dalam pengembangan website, Data Science, dan Internet of Things.">
    <meta name="keywords" content="Muhammad Muhsin, Muhsin IT, Web Developer, IoT Developer, PHP, Laravel, Arduino, ESP32, Data Science, Portofolio IT">
    <meta name="author" content="Muhammad Muhsin">
    <meta name="robots" content="index, follow">
    
    <meta property="og:title" content="Portofolio | Muhammad Muhsin">
    <meta property="og:description" content="Web & IoT Developer | IT Enthusiast. Lihat proyek dan keahlian saya di sini.">
    <meta property="og:image" content="https://github.com/Muhsin-IT/WEB-PORTOFOLIO-STREAMLIT/blob/main/ftprofil1.webp?raw=true">
    <meta property="og:type" content="website">

    <link rel="icon" type="image/webp" href="https://github.com/Muhsin-IT/WEB-PORTOFOLIO-STREAMLIT/blob/main/ftprofil1.webp?raw=true">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            500: '#ff4b4b',
                            600: '#e03e3e',
                        },
                        darkBg: '#0f172a', /* Slate 900 */
                        lightBg: '#f8fafc', /* Slate 50 */
                        cardDark: '#1e293b', /* Slate 800 */
                        cardLight: '#ffffff'
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar for better look */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #475569; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #ff4b4b; }
        
        /* Active nav link style */
        .nav-link.active {
            color: #ff4b4b;
        }
    </style>
</head>
<body class="bg-lightBg text-slate-800 dark:bg-darkBg dark:text-slate-200 font-sans antialiased transition-colors duration-300">

    <nav class="fixed w-full bg-white/80 dark:bg-darkBg/80 backdrop-blur-md z-50 border-b border-slate-200 dark:border-slate-800 transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="#home" class="text-xl font-bold text-slate-900 dark:text-white tracking-wide">Portofo<span class="text-brand-500">lio</span></a>
                </div>
                
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#home" class="nav-link hover:text-brand-500 dark:hover:text-brand-500 transition-colors px-3 py-2 rounded-md font-medium text-sm"><i class="fa-solid fa-house mr-1"></i> Home</a>
                    <a href="#about" class="nav-link hover:text-brand-500 dark:hover:text-brand-500 transition-colors px-3 py-2 rounded-md font-medium text-sm"><i class="fa-solid fa-user mr-1"></i> About</a>
                    <a href="#resume" class="nav-link hover:text-brand-500 dark:hover:text-brand-500 transition-colors px-3 py-2 rounded-md font-medium text-sm"><i class="fa-solid fa-user mr-1"></i> Resume</a>
                    <a href="#skills" class="nav-link hover:text-brand-500 dark:hover:text-brand-500 transition-colors px-3 py-2 rounded-md font-medium text-sm"><i class="fa-solid fa-gear mr-1"></i> Skills</a>
                    <a href="#projects" class="nav-link hover:text-brand-500 dark:hover:text-brand-500 transition-colors px-3 py-2 rounded-md font-medium text-sm"><i class="fa-solid fa-rocket mr-1"></i> Project</a>
                    <a href="#contact" class="nav-link hover:text-brand-500 dark:hover:text-brand-500 transition-colors px-3 py-2 rounded-md font-medium text-sm"><i class="fa-solid fa-phone mr-1"></i> Contact</a>
                    
                    <button id="theme-toggle" class="ml-4 p-2 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-600 transition-all focus:outline-none">
                        <i id="theme-toggle-dark-icon" class="fa-solid fa-moon hidden"></i>
                        <i id="theme-toggle-light-icon" class="fa-solid fa-sun hidden"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-24">
        
        <section id="home" class="section py-20 flex flex-col-reverse md:flex-row items-center justify-between min-h-[80vh]">
            <div class="md:w-3/5 mt-10 md:mt-0 text-center md:text-left">
                <p class="text-lg text-slate-500 dark:text-slate-400 mb-2 font-medium tracking-wide">Hello, my name is</p>
                <h1 class="text-5xl md:text-6xl font-extrabold text-slate-900 dark:text-white mb-4 tracking-tight">Muhammad <span class="text-brand-500">Muhsin</span></h1>
                <h2 class="text-xl md:text-2xl text-slate-600 dark:text-slate-400 mb-8 font-light">I'm a Web & IoT Developer | IT Enthusiast</h2>
                <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                    <a href="#contact" class="bg-brand-500 hover:bg-brand-600 text-white px-8 py-3 rounded-full font-semibold transition duration-300 shadow-lg shadow-brand-500/30">Hubungi Saya</a>
                    <a href="#projects" class="border border-slate-300 dark:border-slate-700 hover:border-brand-500 dark:hover:border-brand-500 hover:text-brand-500 bg-transparent px-8 py-3 rounded-full font-semibold transition duration-300">Lihat Portofolio</a>
                </div>
            </div>
            <div class="md:w-2/5 flex justify-center md:justify-end relative">
                <div class="absolute inset-0 bg-brand-500 rounded-full blur-3xl opacity-20 dark:opacity-20 transform scale-90"></div>
                <img src="https://github.com/Muhsin-IT/WEB-PORTOFOLIO-STREAMLIT/blob/main/ftprofil1.webp?raw=true" alt="Foto Profil Muhammad Muhsin" class="w-64 h-64 md:w-80 md:h-80 object-cover rounded-full border-4 border-white dark:border-slate-800 shadow-2xl relative z-10">
            </div>
        </section>

        <section id="about" class="section py-20 border-t border-slate-200 dark:border-slate-800">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">About <span class="text-brand-500">Me</span></h2>
                <div class="w-16 h-1 bg-brand-500 mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="max-w-4xl mx-auto bg-cardLight dark:bg-cardDark p-8 md:p-10 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700">
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-lg text-justify">
                    Halo! Saya Muhammad Muhsin, saat ini sedang menempuh studi S1 Informatika semester 6 di UNU Yogyakarta. Keseharian saya banyak dihabiskan sebagai software developer yang membangun sistem informasi dan aplikasi web (full-stack). Selain berpengalaman dalam pengembangan front-end dan back-end , saya juga memiliki pengalaman praktis dan teknis di lapangan untuk urusan event, seperti setup Live Streaming, Instalasi Sound System, Mixing Audio, dan Proyektor Video Mapping.
                    <br><br>
                    Saya senang mengeksplorasi teknologi—baik software maupun hardware—dan selalu berusaha memberikan hasil paling maksimal di setiap project yang saya pegang.
                </p>
            </div>
        </section>
        
        <section id="resume" class="section py-20 border-t border-slate-200 dark:border-slate-800">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">Resume & <span class="text-brand-500">Perjalanan</span></h2>
                <div class="w-16 h-1 bg-brand-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-8">
                
                <div>
                    <h3 class="text-2xl font-bold mb-8 text-slate-800 dark:text-slate-200 flex items-center">
                        <i class="fa-solid fa-graduation-cap text-brand-500 mr-3 text-3xl"></i> Pendidikan
                    </h3>
                    
                    <div class="relative border-l-2 border-slate-200 dark:border-slate-700 ml-4 space-y-10">
                        
                        <div class="pl-8 relative group">
                            <div class="absolute w-5 h-5 bg-brand-500 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:scale-125 transition-transform duration-300"></div>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">Universitas Nahdlatul Ulama (UNU) Yogyakarta | PP Al-Miftah</h4>
                            <span class="inline-block px-3 py-1 bg-brand-500/10 text-brand-500 text-sm font-semibold rounded-full mb-2">2023 - Sekarang</span>
                            <p class="text-slate-700 dark:text-slate-300 font-medium">S1 Informatika & Pondok Pesantren</p>
                        </div>

                        <!--<div class="pl-8 relative group">-->
                        <!--    <div class="absolute w-5 h-5 bg-slate-300 dark:bg-slate-600 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:bg-brand-500 group-hover:scale-125 transition-all duration-300"></div>-->
                        <!--    <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">Pendidikan Pesantren</h4>-->
                        <!--    <span class="inline-block px-3 py-1 bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-sm font-semibold rounded-full mb-2">2017 - Sekarang</span>-->
                        <!--    <p class="text-slate-700 dark:text-slate-300 font-medium">Pondok Pesantren Al-Miftah, Kauman</p>-->
                        <!--    <p class="text-slate-500 dark:text-slate-400 text-sm mt-2 leading-relaxed">Aktif sebagai santri dan turut berkontribusi dalam digitalisasi sistem pondok pesantren.</p>-->
                        <!--</div>-->

                        <div class="pl-8 relative group">
                            <div class="absolute w-5 h-5 bg-slate-300 dark:bg-slate-600 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:bg-brand-500 group-hover:scale-125 transition-all duration-300"></div>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">MA Al-Ichsan Nanggulan | PP Al-Miftah</h4>
                            <span class="inline-block px-3 py-1 bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-sm font-semibold rounded-full mb-2">2020 - 2023</span>
                            <p class="text-slate-700 dark:text-slate-300 font-medium">Pendidikan Menenga Atas Jurusan Keagamaan Islam & Pondok Pesantren</p>
                        </div>

                        <div class="pl-8 relative group">
                            <div class="absolute w-5 h-5 bg-slate-300 dark:bg-slate-600 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:bg-brand-500 group-hover:scale-125 transition-all duration-300"></div>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">MTs Al-Ichsan Nanggulan | PP Al-Miftah</h4>
                            <span class="inline-block px-3 py-1 bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-sm font-semibold rounded-full mb-2">2017 - 2020</span>
                            <p class="text-slate-700 dark:text-slate-300 font-medium"><br> Pendidikan Menengah Pertama , berbarengan dengan masuk pondok pesantren</p>
                        </div>

                        <div class="pl-8 relative group">
                            <div class="absolute w-5 h-5 bg-slate-300 dark:bg-slate-600 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:bg-brand-500 group-hover:scale-125 transition-all duration-300"></div>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">SD N Kalikutuk</h4>
                            <span class="inline-block px-3 py-1 bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-sm font-semibold rounded-full mb-2">2011 - 2017</span>
                            <p class="text-slate-700 dark:text-slate-300 font-medium">Pendidikan Dasar</p>
                        </div>

                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold mb-8 text-slate-800 dark:text-slate-200 flex items-center">
                        <i class="fa-solid fa-briefcase text-brand-500 mr-3 text-3xl"></i> Pengalaman Kerja
                    </h3>
                    
                    <div class="relative border-l-2 border-slate-200 dark:border-slate-700 ml-4 space-y-10">
                        
                        <div class="pl-8 relative group">
                            <div class="absolute w-5 h-5 bg-brand-500 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:scale-125 transition-transform duration-300"></div>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">Bisnis Onlin</h4>
                            <span class="inline-block px-3 py-1 bg-brand-500/10 text-brand-500 text-sm font-semibold rounded-full mb-2">2025 - Sekarang</span>
                            <p class="text-slate-700 dark:text-slate-300 font-medium mb-2">Shopee E-Commerce</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Mengelola operasional toko online secara mandiri, Produk sendiri & Dropship.</p>
                        </div>

                        <div class="pl-8 relative group">
                            <div class="absolute w-5 h-5 bg-brand-500 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:scale-125 transition-transform duration-300"></div>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">Kasir & Pengelola Gudang Toko</h4>
                            <span class="inline-block px-3 py-1 bg-brand-500/10 text-brand-500 text-sm font-semibold rounded-full mb-2">2025 - Sekarang</span>
                            <p class="text-slate-700 dark:text-slate-300 font-medium mb-2">Toko Retail / Ritel</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Manajemen stok barang di gudang,, serta mengontrol ketersediaan produk untuk kebutuhan operasional toko harian.</p>
                        </div>

                        <div class="pl-8 relative group">
                            <div class="absolute w-5 h-5 bg-slate-300 dark:bg-slate-600 rounded-full -left-[11px] top-1 border-4 border-lightBg dark:border-darkBg group-hover:bg-brand-500 group-hover:scale-125 transition-all duration-300"></div>
                            <h4 class="font-bold text-xl text-slate-900 dark:text-white mb-1">Kasir Toko</h4>
                            <span class="inline-block px-3 py-1 bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-sm font-semibold rounded-full mb-2">2023 - 2025</span>
                            <p class="text-slate-700 dark:text-slate-300 font-medium mb-2">Toko Retail / Ritel</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Melayani transaksi pelanggan, mencatat arus kas masuk dan keluar.</p>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <section id="skills" class="section py-20 border-t border-slate-200 dark:border-slate-800">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white"><span class="text-brand-500">My</span> Skills</h2>
                <div class="w-16 h-1 bg-brand-500 mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-cardLight dark:bg-cardDark p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-brand-500 dark:hover:border-brand-500 hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-xl group">
                    <div class="w-14 h-14 bg-brand-500/10 rounded-xl flex items-center justify-center text-brand-500 text-3xl mb-6 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">Web Dev & Server</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">PHP, Laravel, Node.js, React, Streamlit, HTML/CSS. Berpengalaman Membuat aplikasi website & mengelola mini server.</p>
                </div>
                <div class="bg-cardLight dark:bg-cardDark p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-brand-500 dark:hover:border-brand-500 hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-xl group">
                    <div class="w-14 h-14 bg-brand-500/10 rounded-xl flex items-center justify-center text-brand-500 text-3xl mb-6 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">Setup Keperluan Event</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Saya memiliki Pengalaman dalam Setup berbagai keperluan Event. Setup Live Streaming , Setup Sound System,dan Proyektor Video Maping</p>
                </div>
                <div class="bg-cardLight dark:bg-cardDark p-8 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-brand-500 dark:hover:border-brand-500 hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-xl group">
                    <div class="w-14 h-14 bg-brand-500/10 rounded-xl flex items-center justify-center text-brand-500 text-3xl mb-6 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-microchip"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">IoT & Perakitan Elektronik</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">C++, pemrograman mikrokontroler, Berpengalaman merakit komponen elektronik, instalasi perangkat keras, serta keahlian penyolderan yang rapi dan beberapa Projec IoT .</p>
                </div>
            </div>
        </section>

        <section id="projects" class="section py-20 border-t border-slate-200 dark:border-slate-800">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">My <span class="text-brand-500">Projects</span></h2>
                <div class="w-16 h-1 bg-brand-500 mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($projects as $project): ?>
                <div class="bg-cardLight dark:bg-cardDark rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 flex flex-col hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-500/10 transition-all duration-300 group">
                    <div class="overflow-hidden">
                        <img src="<?= $project['img'] ?>" alt="<?= $project['title'] ?>" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2 group-hover:text-brand-500 transition-colors"><?= $project['title'] ?></h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 flex-grow leading-relaxed"><?= $project['desc'] ?></p>
                        
                        <div class="mt-auto flex gap-3">
                            <?php if(isset($project['demo_link']) && $project['demo_link'] !== '#'): ?>
                                <a href="<?= $project['demo_link'] ?>" target="_blank" class="flex-1 text-sm font-medium text-white bg-brand-500 hover:bg-brand-600 px-4 py-2.5 rounded-lg text-center transition-colors shadow-sm">
                                    <i class="fa-solid fa-globe mr-1"></i> Demo
                                </a>
                            <?php endif; ?>
                            
                            <?php if(isset($project['github_link']) && $project['github_link'] !== '#'): ?>
                                <a href="<?= $project['github_link'] ?>" target="_blank" class="flex-1 text-sm font-medium text-slate-700 dark:text-white bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 border border-slate-200 dark:border-slate-600 px-4 py-2.5 rounded-lg text-center transition-colors">
                                    <i class="fa-brands fa-github mr-1"></i> Repo
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="contact" class="section py-20 border-t border-slate-200 dark:border-slate-800">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">Let's <span class="text-brand-500">Connect</span></h2>
                <div class="w-16 h-1 bg-brand-500 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-500 dark:text-slate-400 mt-4 max-w-xl mx-auto">Tertarik untuk berkolaborasi atau memiliki pertanyaan? Jangan ragu untuk menghubungi saya melalui platform di bawah ini.</p>
            </div>
            
            <div class="flex flex-wrap gap-6 justify-center">
                <a href="https://www.instagram.com/mad_muhsin/" target="_blank" class="flex flex-col items-center group bg-cardLight dark:bg-cardDark px-6 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-brand-500 hover:shadow-lg transition-all duration-300 min-w-[120px]">
                    <i class="fa-brands fa-instagram text-3xl text-slate-400 group-hover:text-brand-500 mb-2 transition-colors"></i>
                    <span class="text-slate-600 dark:text-slate-300 font-medium group-hover:text-brand-500 text-sm">Instagram</span>
                </a>
                
                <a href="https://github.com/Muhsin-IT" target="_blank" class="flex flex-col items-center group bg-cardLight dark:bg-cardDark px-6 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-brand-500 hover:shadow-lg transition-all duration-300 min-w-[120px]">
                    <i class="fa-brands fa-github text-3xl text-slate-400 group-hover:text-brand-500 mb-2 transition-colors"></i>
                    <span class="text-slate-600 dark:text-slate-300 font-medium group-hover:text-brand-500 text-sm">Github</span>
                </a>
                
                <a href="https://wa.me/6285173235050" target="_blank" class="flex flex-col items-center group bg-cardLight dark:bg-cardDark px-6 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-brand-500 hover:shadow-lg transition-all duration-300 min-w-[120px]">
                    <i class="fa-brands fa-whatsapp text-3xl text-slate-400 group-hover:text-brand-500 mb-2 transition-colors"></i>
                    <span class="text-slate-600 dark:text-slate-300 font-medium group-hover:text-brand-500 text-sm">WhatsApp</span>
                </a>
                
                <a href="mailto:muhsin230105@gmail.com" target="_blank" class="flex flex-col items-center group bg-cardLight dark:bg-cardDark px-6 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 hover:border-brand-500 hover:shadow-lg transition-all duration-300 min-w-[120px]">
                    <i class="fa-solid fa-envelope text-3xl text-slate-400 group-hover:text-brand-500 mb-2 transition-colors"></i>
                    <span class="text-slate-600 dark:text-slate-300 font-medium group-hover:text-brand-500 text-sm">Email</span>
                </a>
            </div>
        </section>

    </main>

    <footer class="bg-cardLight dark:bg-cardDark py-8 text-center border-t border-slate-200 dark:border-slate-800 transition-colors duration-300">
        <p class="text-slate-500 dark:text-slate-400 text-sm">&copy; <?= date("Y") ?> Muhammad Muhsin. All rights reserved.</p>
    </footer>

    <script>
        // 1. Dark Mode Toggle Logic
        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        // Cek preferensi user (Local Storage atau sistem)
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            lightIcon.classList.remove('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            darkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });

        // 2. Active Link Navigation Logic
        const sections = document.querySelectorAll('section.section');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                // Sesuaikan threshold scroll dengan tinggi navbar
                if (scrollY >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    
    <!--------------------------------------------- witget -------------- -->
   <div class="fixed bottom-6 right-6 bg-white/90 dark:bg-cardDark/90 backdrop-blur-md border border-slate-200 dark:border-slate-700 p-4 rounded-2xl shadow-xl z-50 flex items-center gap-5 transition-colors duration-300">
        <div class="flex items-center gap-2" title="Orang yang sedang melihat web ini">
            <div class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </div>
            <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                Online: <span id="live-online" class="text-brand-500 font-bold">...</span>
            </span>
        </div>

        <div class="w-px h-6 bg-slate-300 dark:bg-slate-600"></div>

        <div class="flex items-center gap-2" title="Total kunjungan web">
            <i class="fa-solid fa-eye text-slate-400 dark:text-slate-500"></i>
            <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                Views: <span id="live-views" class="text-brand-500 font-bold">...</span>
            </span>
        </div>
    </div>

    <script>
        function updateStats() {
            // Memanggil file api_stats.php secara diam-diam (background)
            fetch('api_stats.php')
                .then(response => response.json())
                .then(data => {
                    // Update angka di layar secara langsung
                    document.getElementById('live-online').innerText = data.online;
                    document.getElementById('live-views').innerText = data.views;
                })
                .catch(error => console.error('Error fetching stats:', error));
        }

        // Jalankan fungsi saat web pertama kali dibuka
        updateStats();

        // Jalankan fungsi updateStats setiap 3 detik (3000 milidetik)
        setInterval(updateStats, 5000);
    </script>
</body>
</html>