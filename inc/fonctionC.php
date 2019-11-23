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
        $sql="select * from amammou.adresses where u_uname='$uname' ORDER BY add_id ASC";
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
        $sql2="DELETE FROM amammou.adresses WHERE u_uname = '$uname' ";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
            $db->query($sql2);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function addAddress($address)
    {
        $sql= "insert into amammou.adresses(u_uname, add_name, name, street, city, zip_code, state, country, phone) values (:un,:an,:na,:st,:ci,:zip,:stt,:co,:ph)";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(':un',$address->getUname());
            $req->bindValue(':an',$address->getAdname());
            $req->bindValue(':na',$address->getName());
            $req->bindValue(':st',$address->getStreet());
            $req->bindValue(':ci',$address->getCity());
            $req->bindValue(':zip',$address->getZip());
            $req->bindValue(':stt',$address->getState());
            $req->bindValue(':co',$address->getCountry());
            $req->bindValue(':ph',$address->getPhone());

            $req->execute();
            return true;

        }
        catch (Exception $e)
        {
            return('Erreur: '.$e->getCode());
        }
    }
    public function deleteAdd($addId)
    {
        $sql="DELETE FROM amammou.adresses WHERE add_id = '$addId' ";
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
    function editAdd($add_id,$add_name,$name,$street,$city,$state,$zip,$phone)
    {
        $sql="update amammou.adresses set add_name= '$add_name', name='$name',street='$street',city='$city',state='$state',zip_code='$zip', phone='$phone' where add_id='$add_id'";
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