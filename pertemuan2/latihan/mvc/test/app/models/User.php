<?php
/**
 * Model User
 * Menangani semua operasi database yang berkaitan dengan tabel users
 */
class User {
    // Property untuk menyimpan koneksi database
    private $pdo;

    /**
     * Constructor
     * $pdo - Objek koneksi database
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Mengambil semua data pengguna dari database
     */
    public function getAllUsers() {
        $stmt = $this->pdo->prepare("SELECT * FROM users ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mengambil data pengguna berdasarkan ID
     * $id - ID pengguna yang ingin diambil
     */
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Menambahkan pengguna baru
     * $data - Array berisi data user (name, email, phone)
     */
    public function insertUser($data) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['email'], $data['phone']]);
    }

    /**
     * Memperbarui data pengguna
     * $data - Array berisi data user (id, name, email, phone)
     */
    public function updateUser($data) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['id']]);
    }

    /**
     * Menghapus pengguna berdasarkan ID
     * $id - ID pengguna
     */
    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>