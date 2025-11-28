<?php
/**
 * Controller User
 * Mengatur tampilan daftar user dan detail user
 */
class UserController {
    private $userModel; 

    // Constructor - buat object User model
    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    // Method utama - routing berdasarkan parameter
    public function index() {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            
            switch ($action) {
                case 'create':
                    $this->create();
                    break;
                case 'store':
                    $this->store();
                    break;
                case 'edit':
                    $this->edit($_GET['id']);
                    break;
                case 'update':
                    $this->update();
                    break;
                case 'delete':
                    $this->delete($_GET['id']);
                    break;
                case 'show':
                    $this->show($_GET['id']);
                    break;
                default:
                    $this->list();
                    break;
            }
        } else if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->show($_GET['id']);
        } else {
            $this->list();
        }
    }

    // Tampilkan daftar semua user
    private function list() {
        $users = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../views/list.php';
    }

    // Tampilkan form tambah user
    private function create() {
        require_once __DIR__ . '/../views/create.php';
    }

    // Proses tambah user
    private function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            ];
            
            if ($this->userModel->insertUser($data)) {
                header('Location: index.php?success=created');
                exit;
            } else {
                header('Location: index.php?error=create_failed');
                exit;
            }
        }
    }

    // Tampilkan form edit user
    private function edit($id) {
        $user = $this->userModel->getUserById($id);
        require_once __DIR__ . '/../views/edit.php';
    }

    // Proses update user
    private function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            ];
            
            if ($this->userModel->updateUser($data)) {
                header('Location: index.php?success=updated');
                exit;
            } else {
                header('Location: index.php?error=update_failed');
                exit;
            }
        }
    }

    // Proses hapus user
    private function delete($id) {
        if ($this->userModel->deleteUser($id)) {
            header('Location: index.php?success=deleted');
            exit;
        } else {
            header('Location: index.php?error=delete_failed');
            exit;
        }
    }

    // Tampilkan detail user berdasarkan id
    private function show($id) {
        $user = $this->userModel->getUserById($id);
        require_once __DIR__ . '/../views/detail.php';
    }
}
?>