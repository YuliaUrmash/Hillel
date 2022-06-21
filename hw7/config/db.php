<?php

namespace config;

use PDOException;
use PDO;

class Connect
{
    protected $db;

    public function __construct($dbname = 'blog1', $username = 'root', $password = '', $host = 'localhost')
    {
        try {
            $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        } catch (PDOException $e) {
            die('Error connection' . $e->getMessage());
        }
    }

    public function tableExists(string $table): bool
    {
        try {
            $result = $this->db->query("SELECT 1 FROM $table LIMIT 1");
        } catch (\PDOException $e) {
            return false;
        }

        return true;
    }

    public function createTable(string $tableName)
    {
        $query = $this->db->prepare("CREATE TABLE $tableName (id int UNSIGNED AUTO_INCREMENT PRIMARY KEY ,name varchar(35) NOT NULL ,surname varchar(35) NOT NULL ,email varchar(100) UNIQUE NOT NULL ,age int UNSIGNED);");
        $query->execute();
    }

    public function addUser(string $name, string $surname, int $age, string $email)
    {
        $query = $this->db->prepare("INSERT INTO users(name, surname, age, email) VALUES(:name, :surname, :age, :email)");
        $values = ['name' => $name, 'surname' => $surname, 'age' => $age, 'email' => $email];
        $query->execute($values);
    }

    public function getAllUsers()
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $values = ['id' => $id];
        $query->execute($values);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id IN (" . implode(',', array_map('intval', $id)) . ")";
        $query = $this->db->prepare($sql);
        $query->execute();


    }

}