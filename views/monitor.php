<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring | Portofolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: { 500: '#ff4b4b', 600: '#e03e3e' },
                        darkBg: '#0f172a',
                        cardDark: '#1e293b'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 dark:bg-darkBg text-slate-800 dark:text-slate-200 font-sans min-h-screen flex flex-col items-center justify-center p-4">

    <div class="max-w-3xl w-full">
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-2">Live <span class="text-brand-500">Monitoring</span></h1>
            <p class="text-slate-500 dark:text-slate-400">Pantau statistik pengunjung web portofolio secara real-time.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-cardDark p-8 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col items-center justify-center transform transition-all hover:scale-105">
                <div class="w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center mb-4 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <i class="fa-solid fa-users text-3xl text-green-500 relative z-10"></i>
                </div>
                <h2 class="text-lg font-medium text-slate-500 dark:text-slate-400 mb-1">Sedang Online</h2>
                <div class="text-6xl font-extrabold text-slate-900 dark:text-white flex items-baseline gap-2">
                    <span id="dash-online">0</span>
                    <span class="text-sm font-normal text-slate-500">User</span>
                </div>
            </div>

            <div class="bg-white dark:bg-cardDark p-8 rounded-2xl shadow-lg border border-slate-200 dark:border-slate-700 flex flex-col items-center justify-center transform transition-all hover:scale-105">
                <div class="w-16 h-16 bg-brand-500/10 rounded-full flex items-center justify-center mb-4">
                    <i class="fa-solid fa-eye text-3xl text-brand-500"></i>
                </div>
                <h2 class="text-lg font-medium text-slate-500 dark:text-slate-400 mb-1">Total Kunjungan</h2>
                <div class="text-6xl font-extrabold text-slate-900 dark:text-white flex items-baseline gap-2">
                    <span id="dash-views">0</span>
                    <span class="text-sm font-normal text-slate-500">Views</span>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400 flex items-center justify-center gap-2">
            <i class="fa-solid fa-rotate animate-spin text-brand-500"></i> Auto-refresh setiap 3 detik...
        </div>
        
        <div class="mt-8 text-center">
             <a href="index.php" class="inline-block border border-slate-300 dark:border-slate-700 hover:border-brand-500 dark:hover:border-brand-500 hover:text-brand-500 px-6 py-2 rounded-full font-medium transition duration-300">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Web
            </a>
        </div>
    </div>

    <script>
        function fetchDashboardStats() {
            // Memanggil api_stats.php yang sudah ada di sistem kamu
            fetch('api_stats.php')
                .then(response => response.json())
                .then(data => {
                    // Update angka dengan animasi sederhana
                    document.getElementById('dash-online').innerText = data.online;
                    document.getElementById('dash-views').innerText = data.views;
                })
                .catch(error => console.error('Gagal mengambil data:', error));
        }

        // Jalankan saat pertama kali dibuka
        fetchDashboardStats();

        // Refresh data setiap 3 detik agar lebih real-time
        setInterval(fetchDashboardStats, 3000);
    </script>
</body>
</html>