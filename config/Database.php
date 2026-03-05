<?php
class Database {
    private $conn;

    public function getConnection() {
        // Baca file .env
        $env = parse_ini_file(__DIR__ . '/../.env');
        
        $this->conn = new mysqli($env['DB_HOST'], $env['DB_USER'], $env['DB_PASS'], $env['DB_NAME']);
        
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
?>