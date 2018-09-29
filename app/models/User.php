<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;

    }

    public function register($data)
    {

        $this->db->query('INSERT INTO users(name,email,password) VALUES(:name,:email,:password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute())
            return true;
        else return false;
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hash_password = $row->password;

        if (password_verify($password, $hash_password)) {
            return $row;

        } else return false;

    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        if ($this->db->rowcount() > 0)
            return true;
        else return false;

    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        if ($this->db->rowcount() > 0)
            return $row;
        else return false;

    }

    public function checkSecurityCode()
    {
        $code = $_REQUEST['code'];
        $SecurityCode = mb_strtolower($code) == mb_strtolower($_SESSION['code']);
        if (!$SecurityCode) {
            unset($_REQUEST['Register']);
            flash("wrong_code", "The security code is wrong");
            redirect('users/register');

        } else
            return true;

    }

}