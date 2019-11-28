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
    function getAdmins()
    {
        $sql="select * from amammou.admin";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    function addAdmin($admin)
    {
        $sql="insert into amammou.admin (login, email, pwd, name) values (:log,:em,:pw,:na)";
        $db=config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(':log',$admin->getLogin());
            $req->bindValue(':em',$admin->getEmail());
            $req->bindValue(':pw',md5($admin->getPwd()));
            $req->bindValue(':na',$admin->getName());
            $req->execute();
        }
        catch (Exception $e)
        {
            echo 'Error :'.$e->getMessage();
        }
    }
    function editAdmin($login,$name,$email)
    {
        $sql="update amammou.admin set name='$name',email='$email' where login='$login'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'Error: '.$e->getMessage();
        }
    }
    function editStatus($login,$status)
    {
        if($status==1)
        {
            $sql="update amammou.admin set status = 0 where login='$login'";
        }
        else if($status==0)
        {
            $sql="update amammou.admin set status = 1 where login='$login'";
        }
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'Error: '.$e->getMessage();
        }

    }
    function addTech($tech)
    {
        $sql="insert into amammou.techs (login, pwd, email, name) values (:log,:pw,:em,:na)";
        $db=config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(':log',$tech->getLogin());
            $req->bindValue(':em',$tech->getEmail());
            $req->bindValue(':pw',md5($tech->getPwd()));
            $req->bindValue(':na',$tech->getName());
            $req->execute();
        }
        catch (Exception $e)
        {
            echo 'Error :'.$e->getMessage();
        }
    }
    function getTechs()
    {
        $sql="select * from amammou.techs";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    function editTech($login,$name,$email)
    {
        $sql="update amammou.techs set name='$name',email='$email' where login='$login'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'Error: '.$e->getMessage();
        }
    }
    public function deleteTech($login)
    {
        $sql="DELETE FROM amammou.techs WHERE login = '$login'";
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
    function getProds($l=null)
    {
        $sql="select * from amammou.produit ORDER BY reference DESC";
        if($l!=null)
        {
            $sql=$sql." limit $l";
        }
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    function ajouterPanier($p_id)
    {
  		$sql="insert into amammou.cart (p_id,ip_add,qty) values (:p_id,:ip_add,:qty)";
  		$db = config::getConnexion();
  		try
      {
          $req=$db->prepare($sql);
          $ipA=getHostByName(getHostName());
          $qty=1;

      		$req->bindValue(':p_id',$p_id);
      		$req->bindValue(':ip_add',$ipA);
      		$req->bindValue(':qty',$qty);

          $req->execute();


      }

      catch (Exception $e)
      {
          if($e->getCode()==23000)
          {
            $sql2="update amammou.cart set qty = qty+1 where p_id='$p_id'";
            $db = config::getConnexion();
            try
            {
              $db->query($sql2);
            }
            catch (Exception $e)
            {
              echo 'Error: '.$e->getMessage();
            }


          }

      }

  	}
    function getCart($ipA)
    {
      $sql="select * from amammou.cart where ip_add='$ipA'";
      $db= config::getConnexion();
      try
      {
        return $db->query($sql);
      }
      catch (Exception $e)
      {
        echo 'Error: '.$e->getMessage;
      }

    }
    function getProd($idP)
    {
        $sql="select * from amammou.produit where reference='$idP'";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql)->fetch();
        }
        catch (Exception $e)
        {
            echo 'error:'.$e->getMessage();
        }
    }
    function deleteCart($idP)
    {
        $ipA=getHostByName(getHostName());
        $sql="delete from amammou.cart where ip_add='$ipA' and p_id='$idP'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error:'.$e->getMessage();
        }
    }
    function updateCart($idP,$qty)
    {
        $sql="update amammou.cart set qty='$qty' where p_id='$idP'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error: '.$e->getMessage();
        }
    }
    function ajouterCommande($idCommande)
    {
    		$sql="insert into amammou.cart (idCommande,idProduit,nomProduit,prixProduit,prixTotal,quantite,idClient,idAdd) values (:idCommande,:idProduit,:nomProduit,:prixProduit,:prixTotal,:quantite,:idClient,:idAdd)";
    	  $db = config::getConnexion();
    	try
    	{
    			$req=$db->prepare($sql);
    			$quantite=1;

    			$req->bindValue(':idCommande',$idC);
    			$req->bindValue(':idProduit',$idP);
    			$req->bindValue(':nomProduit',$nP);
    			$req->bindValue(':prixProduit',$pP);
    			$req->bindValue(':prixTotal',$pT);
    			$req->bindValue(':quantite',$quantite);
    			$req->bindValue(':idClient',$nC);
    			$req->bindValue(':idAdd',idA);

    			$req->execute();


    	}

}
