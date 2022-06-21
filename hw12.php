<?php

interface ContactUsers
{
    public function name($name);

    public function surname($surname);

    public function email($email);

    public function phone($phone);

    public function address($address);

}

class Contacts implements ContactUsers
{
    private $contacts;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->contacts = new Contact();
    }

    public function phone($phone)
    {
        $this->contacts->parts[] = $phone;
        return $this;
    }

    public function name($name)
    {
        $this->contacts->parts[] = $name;
        return $this;
    }

    public function surname($surname)
    {
        $this->contacts->parts[] = $surname;
        return $this;
    }

    public function email($email)
    {
        $this->contacts->parts[] = $email;
        return $this;
    }

    public function address($address)
    {
        $this->contacts->parts[] = $address;
        return $this;
    }

    public function build()
    {
        $build = $this->contacts;
        $this->reset();
        return $build;
    }
}

class Contact
{
    public $parts = [];
}

$contact = new Contacts();
$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();
echo '<pre>';
print_r($newContact);
echo '</pre>';