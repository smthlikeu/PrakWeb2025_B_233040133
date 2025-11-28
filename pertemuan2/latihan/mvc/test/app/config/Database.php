<?php
<<<<<<< HEAD
class Database
{
=======
class Database {
>>>>>>> e2825b7a9b5867c927d32e4a4af8231903d840c4
    // Konfigurasi database
    private $host = "localhost";
    private $dbname = "prakweb_pertemuan2";
    private $username = "root";
    private $password = "";
    private $pdo;

    /**
     * Method untuk koneksi ke database
     */
<<<<<<< HEAD
    public function connect()
    {
=======
    public function connect() {
>>>>>>> e2825b7a9b5867c927d32e4a4af8231903d840c4
        // Cek apakah koneksi sudah dibuat
        if ($this->pdo === null) {
            try {
                // Buat koneksi PDO
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                // Set error mode ke exception
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
