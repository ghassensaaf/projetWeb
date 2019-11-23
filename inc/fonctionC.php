<?php

include "config.php";
class fonctionC
{
    function addUser($user)
    {
        $sql= "insert into amammou.users(u_uname,u_name,u_email,u_pwd,u_phone) values (:un,:na,:em,:pw,:ph)";
        $db = config::getConnexion();

        try
        {
            $req=$db->prepare($sql);
            $un=$user->uname;
            $na=$user->name;
            $em=$user->email;
            $ph=$user->phone;
            $pwd=$user->getPwd();

            $req->bindValue(':un',$un);
            $req->bindValue(':na',$na);
            $req->bindValue(':em',$em);
            $req->bindValue(':ph',$ph);
            $req->bindValue(':pw',MD5($pwd));

            $req->execute();
            return true;

        }
        catch (Exception $e)
        {
            return('Erreur: '.$e->getCode());
        }

    }
    public function Logedin($login,$pwd)
    {
        $req="select * from amammou.users where u_uname='$login' && u_pwd=MD5('$pwd')";
        $db = config::getConnexion();
        try
        {
            $rep=$db->query($req);
            return $rep->fetchAll();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }
    function showUsers()
    {
        $sql="select * from amammou.users";
        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list->fetchAll();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function showAdress($uname)
    {
        $sql="select * from amammou.adresses where u_uname='$uname'";
        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function editUser($uname,$name,$email,$phone,$pwd=null)
    {
        $sql="update amammou.users set u_name= '$name', u_email='$email', u_phone='$phone'";
        if(($pwd==null) or ($pwd==""))
        {
            $sql=$sql." where u_uname='$uname'";
        }
        else
        {
            $sql=$sql.",u_pwd=md5('$pwd') where u_uname='$uname'";
            echo $sql;
        }
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function getUser($uname)
    {
        $sql="select * from amammou.users where u_uname='$uname'";
        $db = config::getConnexion();
        try
        {
            $u=$db->query($sql);
            return $u;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function adminLogIn($login,$pwd)
    {
        $req="select * from amammou.admin where login='$login' && pwd=md5('$pwd')";
        $db = config::getConnexion();
        try
        {
            $rep=$db->query($req);
            return $rep->fetchAll();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }
    public function deleteUser($uname)
    {
        $sql="DELETE FROM amammou.users WHERE u_uname = '$uname' ";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
}