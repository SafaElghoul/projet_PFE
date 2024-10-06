<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Admin.php';

class AdminController {
    private $db;
    private $admin;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->admin = new Admin($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = $this->admin->login($username, $password);
            if ($admin) {
                header("Location: /admin/dashboard.php");
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        include __DIR__ . '/../views/admin/login.php';
    }
}
?>
