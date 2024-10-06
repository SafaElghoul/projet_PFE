<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->user->login($username, $password);
            if ($user) {
                header("Location: /user/dashboard.php");
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        include __DIR__ . '/../views/user/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone_number = $_POST['phone_number'];
            $delivery_address = $_POST['delivery_address'];
            $postal_code = $_POST['postal_code'];
            $city = $_POST['city'];

            if ($this->user->register($username, $email, $password, $first_name, $last_name, $phone_number, $delivery_address, $postal_code, $city)) {
                echo "Inscription réussie !";
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }

        include __DIR__ . '/../views/user/register.php';
    }
}
?>
