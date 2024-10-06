<?php
class User {
    private $conn;
    private $table_name = "User";

    public $id;
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $delivery_address;
    public $postal_code;
    public $city;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $email, $password, $first_name, $last_name, $phone_number, $delivery_address, $postal_code, $city) {
        $query = "INSERT INTO " . $this->table_name . " (username, email, password, first_name, last_name, phone_number, delivery_address, postal_code, city) 
                  VALUES (:username, :email, :password, :first_name, :last_name, :phone_number, :delivery_address, :postal_code, :city)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':delivery_address', $delivery_address);
        $stmt->bindParam(':postal_code', $postal_code);
        $stmt->bindParam(':city', $city);
        return $stmt->execute();
    }

    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username AND password = :password LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
