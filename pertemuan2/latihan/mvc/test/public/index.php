<?php
// Load semua file yang diperlukan
require_once __DIR__ . '/../app/config/Database.php';
require_once __DIR__ . '/../app/models/User.php';
require_once __DIR__ . '/../app/controllers/UserController.php';

// Buat koneksi database
$database = new Database();
$pdo = $database->connect();

// Jalankan controller
$controller = new UserController($pdo);
<<<<<<< HEAD
$controller->index();
=======
$controller->index();
>>>>>>> e2825b7a9b5867c927d32e4a4af8231903d840c4
