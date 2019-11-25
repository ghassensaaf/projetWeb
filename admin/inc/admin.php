<?php


class admin
{
    private $login;
    private $email;
    private $pwd;
    private $status;
    private $name;

    function __construct($login,$name,$email,$pwd)
    {
        $this->login=$login;
        $this->name=$name;
        $this->email=$email;
        $this->pwd=$pwd;
    }

    /**
     * @param mixed $email
     */
    /**
     * @return mixed
     */
    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getStatus()
    {
        return $this->status;
    }
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