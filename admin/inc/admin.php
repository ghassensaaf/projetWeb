<?php


class admin
{
    private $login;
    private $email;
    private $pwd;

    function __construct($login,$email,$pwd)
    {
        $this->login=$login;
        $this->email=$email;
        $this->pwd=$pwd;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }
}