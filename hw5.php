<?php

class User
{
    public int $id;
    public string $password;

    public function __construct($id, $password)
    {
        if (!is_numeric($id)) {
            throw new Exception('id should be integer');
        }
        $this->id = $id;

        if (mb_strlen($password) > 8) {
            throw new Exception('password contains more than 8 symbols');
        }
        $this->password = $password;
    }

    public function getUserData()
    {
        return ['id' => $this->id,
            'password' => $this->password];
    }

}

try {
    $newUser = new User(12, 'nekwhefn');
    print_r($newUser->getUserData());
} catch (Exception $e) {
    echo $e->getMessage();
    echo ' in file: ' . $e->getFile();
    echo ' on line: ' . $e->getLine();
}

