<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | Muhammad Muhsin</title>
    <link rel="icon" type="image/webp" href="https://raw.githubusercontent.com/Muhsin-IT/comen/refs/heads/main/muhsin500px.webp">
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
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-lightBg text-slate-800 dark:bg-darkBg dark:text-slate-200 font-sans antialiased transition-colors duration-300 flex items-center justify-center min-h-screen relative overflow-hidden">

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-brand-500 rounded-full blur-[120px] opacity-20 pointer-events-none"></div>

    <div class="text-center px-4 relative z-10">
        <div class="relative inline-block mb-6">
            <h1 class="text-[150px] md:text-[200px] font-extrabold text-slate-200 dark:text-slate-800/50 tracking-tighter leading-none select-none">
                404
            </h1>
            <div class="absolute inset-0 flex items-center justify-center text-brand-500 text-5xl md:text-7xl drop-shadow-lg animate-bounce">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
        </div>

        <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-4 tracking-tight">
            SEPERTINYA ANDA <span class="text-brand-500">TERSESAT</span>
        </h2>

        <p class="text-slate-500 dark:text-slate-400 text-lg mb-10 max-w-lg mx-auto leading-relaxed">
            Halaman atau file yang Anda coba akses tidak ditemukan. Mungkin sudah dihapus, diubah namanya, atau disembunyikan untuk alasan keamanan.
        </p>

        <a href="/" class="inline-flex items-center bg-brand-500 hover:bg-brand-600 text-white px-8 py-3.5 rounded-full font-semibold text-lg transition duration-300 shadow-lg shadow-brand-500/30 group hover:-translate-y-1">
            <i class="fa-solid fa-arrow-left mr-3 group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Beranda
        </a>
    </div>

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</body>
</html>