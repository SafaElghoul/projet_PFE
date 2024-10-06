<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Manager.php';

class ManagerController {
    private $db;
    private $manager;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->manager = new Manager($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $manager = $this->manager->login($username, $password);
            if ($manager) {
                header("Location: /manager/dashboard.php");
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        include __DIR__ . '/../views/manager/login.php';
    }
}
?>
