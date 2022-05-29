<?php

class User
{
    private $name;
    private $age;
    private $email;

    public function __call($name, array $arguments)
    {
        if (method_exists($this, $name)) {
            $this->$name(implode(',', $arguments));
        } else {
            die('Метод не существует');
        }
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setAge($age)
    {
        $this->age = $age;
    }

    public function getAll(): array
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email];
    }
}

$user = new User();
$user->setName('Yuliana');
$user->setAge(21);
//$user->setEmail('yuliaurmash@gmail.com');
echo '<pre>';
print_r($user->getAll());
echo '</pre>';

