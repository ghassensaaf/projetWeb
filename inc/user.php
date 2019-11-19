<?php

class user
{
    public $uname;
    public $email;
    public $name;
    private $pwd;

    public function __construct($uname,$name,$email,$pwd)
    {
        $this->uname=$uname;
        $this->name=$name;
        $this->email=$email;
        $this->pwd=$pwd;
    }

    /**
     * @param mixed $uname
     */
    public function setUname($uname): void
    {
        $this->uname = $uname;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $pwd
     */
     function setPwd($pwd): void
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mixed
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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

}
