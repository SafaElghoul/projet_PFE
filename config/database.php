<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'projet_pfe';  // Change cela avec le nom de ta base
    private $username = 'root'; // Par défaut dans XAMPP
    private $password = ''; // Par défaut dans XAMPP
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
