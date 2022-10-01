<?php

class User
{
    private $user_name;
    private $email;
    private $password;
    private $address;
    private $phone;
    private $gender;

    public function __construct($id, $name, $mail, $pass, $address, $phone, $gen)
    {
        $this->user_id = $id;
        $this->user_name = $name;
        $this->email = $mail;
        $this->phone = $phone;
        $this->gender = $gen;
        $this->address = $address;
        $this->password = $pass;
    }

    public function get_id()
    {
        return $this->user_id;
    }
    public function get_username()
    {
        return $this->user_name;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_address()
    {
        return $this->address;
    }
    public function get_phone()
    {
        return $this->phone;
    }
    public function get_gender()
    {
        return $this->gender;
    }
}
