<?php

session_start();

// Konfigurasi Database (Sesuaikan dengan server Anda)
$host = '11.11.11.158';
$user = 'aapanel'; 
$pass = 'admin1973'; 
$db   = 'db_portofolio'; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(['error' => 'DB Connection Failed']));
}

date_default_timezone_set('Asia/Jakarta');

$current_time = date('Y-m-d H:i:s');
$timeout_limit = date('Y-m-d H:i:s', strtotime('-10 seconds'));
$session_id = session_id(); // <-- Gunakan Session ID, bukan IP Address

// 1. Catat/Update waktu aktivitas pengunjung ini
$stmt = $conn->prepare("INSERT INTO online_users (session_id, last_activity) VALUES (?, ?) ON DUPLICATE KEY UPDATE last_activity = ?");
$stmt->bind_param("sss", $session_id, $current_time, $current_time);
$stmt->execute();

// 2. Hapus yang sudah tidak aktif lebih dari 5 menit
$conn->query("DELETE FROM online_users WHERE last_activity < '$timeout_limit'");

// 3. Ambil data terbaru
$result_online = $conn->query("SELECT COUNT(*) AS online_count FROM online_users");
$online_users = ($result_online->num_rows > 0) ? $result_online->fetch_assoc()['online_count'] : 1;

$result_views = $conn->query("SELECT total_views FROM page_views WHERE page_name = 'home'");
$total_views = ($result_views->num_rows > 0) ? $result_views->fetch_assoc()['total_views'] : 0;

// Kembalikan data dalam format JSON agar bisa dibaca oleh JavaScript
echo json_encode([
    'online' => $online_users,
    'views' => $total_views
]);
?>