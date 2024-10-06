<?php
// Inclusion des contrôleurs et de la base de données
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/ManagerController.php';
require_once __DIR__ . '/controllers/UserController.php';

// Démarrage de la session pour gérer l'authentification
session_start();

// Vérification du rôle dans l'URL
if (isset($_GET['role'])) {
    $role = $_GET['role'];

    // Si l'action est définie dans l'URL (ex: action=register)
    if (isset($_GET['action']) && $_GET['action'] === 'register' && $role === 'user') {
        // Inscription pour le client
        $userController = new UserController();
        $userController->register();
    } else {
        // Connexion en fonction du rôle
        switch ($role) {
            case 'admin':
                // Connexion pour l'administrateur
                $adminController = new AdminController();
                $adminController->login();
                break;

            case 'manager':
                // Connexion pour le gestionnaire
                $managerController = new ManagerController();
                $managerController->login();
                break;

            case 'user':
                // Connexion pour le client
                $userController = new UserController();
                $userController->login();
                break;

            default:
                echo "Erreur : rôle non défini.";
        }
    }
} else {
    // Page d'accueil par défaut ou redirection
    echo "Bienvenue sur notre site e-commerce. Veuillez vous connecter.";
}
?>
