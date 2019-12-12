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


        }
        catch (Exception $e)
        {
            echo('Erreur: '.$e->getCode());
        }

        $sql2="insert into amammou.solde_fidelite (uname) value ('$un')";
        try
        {
            $db->query($sql2);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
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
    function showAdress($uname=null,$addid=null)
    {
        if($addid!=null)
        {
            $sql="select * from amammou.adresses where add_id='$addid' ORDER BY add_id ASC";
        }
        else if($uname!=null)
        {
            $sql="select * from amammou.adresses where u_uname='$uname' ORDER BY add_id ASC";
        }

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
    function getProds($l=null,$en_prom=null,$cat=null,$search=null)
    {
        $sql="select * from amammou.produit ORDER BY reference DESC";
        if($l!=null)
        {
            $sql=$sql." limit $l";
        }
        if($en_prom==1)
        {
            $sql="select * from amammou.produit where en_prom='$en_prom' ORDER BY reference DESC" ;
        }
        if($search!=null)
        {
            $sql="select * from amammou.produit where keyword like '%$search%'";
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
    // aaa
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
      // aaa tekhou prouit men panier
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
        echo 'Error: '.$e->getMessage();
      }

    }
      // aaa te5ou produit kahaw bel id mte3ou
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
      // aaa tfasse5 prduit mel panier
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
      // aaa tbadel qtt fel panier
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
      // aaa ajouter commande   , ta3ti lkol prod num fatoura(inooNumber) w ta3tih lel commande bch tnajem tchouf les produits l mawjoudin fel fatoua
    function addFromCart($uname,$idAdd)
        {
            $ipA=gethostbyname(gethostname());
            $l=$this->getCart($ipA);
            $x=random_int(1000000,9999999);
            $v=0;
            $n=0;
            foreach ($l as $p)
            {
                $pId=$p["p_id"];
                $qty=$p["qty"];
                $prod=$this->getProd($pId);
                $v=$v+$prod["prix"]*$qty;
                $n=$n+$qty;
                // ta3ti num fatoura lkol produit fel panier
                $sql="insert into amammou.pending_orders (uname, innoNumb, prodId,idAdd, qty) values ('$uname','$x','$pId','$idAdd','$qty')";
                $sql2="update amammou.produit set quantite = quantite- '$qty' where  reference='$pId'";
                $db=config::getConnexion();
                try
                {
                    $db->query($sql);
                    $db->query($sql2);
                }
                catch (Exception $e)
                {
                    echo 'error :'.$e->getMessage();
                }

        }
        $fid=$this->getSoldeF($uname)["solde"];
            $due=$v;
            $dis=0;
        if($fid<$v)
        {
            $v=$v-$fid;
            $dis=$fid;
            $fid=0;
        }
        else
        {
            $fid=$fid-$v;
            $dis=$v;
            $v=0;
        }
        $sql5="update amammou.solde_fidelite set solde='$fid' where uname='$uname'";
            $db=config::getConnexion();
        try
        {
            $db->query($sql5);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
          // aaa ta3mel commande fiha num el fatoura
        $sql2="insert into amammou.orders (uname, dueAmount, innoNumber, totalQty, idAdd,discount) values ('$uname','$v','$x','$n','$idAdd','$dis')";
        try
        {
            $db->query($sql2);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
        $sql3="delete from amammou.cart where ip_add='$ipA'";
        try
        {
            $db->query($sql3);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
        $sql4="update amammou.solde_fidelite set solde=solde+'$due'*0.05 where uname='$uname'";
        try
        {
            $db->query($sql4);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function getOrders($uname=null,$inno=null,$ett=null)
    {
        if ($uname!=null)
        {
            $sql="select * from amammou.orders where uname='$uname' order by OrderDate desc";
        }
        else if($inno!=null)
        {
            $sql="select * from amammou.orders where innoNumber='$inno' order by OrderDate desc";
            $db=config::getConnexion();
            try
            {
                return $db->query($sql)->fetch()["discount"];
            }
            catch (Exception $e)
            {
                echo 'error :'.$e->getMessage();
            }
        }
        else if($ett!=null)
        {
            $sql="select * from amammou.orders  where Status=1";
        }
        else
        {
            $sql="select * from amammou.orders  order by OrderDate desc";
        }
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function getOrderProds($inno)
    {
        $sql="select * from amammou.pending_orders where innoNumb='$inno'";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function confirmOrder($inno)
    {
        $sql="update amammou.orders set Status=1  where innoNumber='$inno'";
        $db=config::getConnexion();
        try
        {
           $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function cancelOrder($inno)
    {
        $sql="update amammou.orders set Status=-1 where innoNumber='$inno'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
        $sql2="select * from amammou.orders where innoNumber='$inno'";
        try
        {
            $o=$db->query($sql2)->fetch();
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
        $uname=$o["uname"];
        $d=$o["discount"];
        $m=($o["dueAmount"]+$d)*0.05;
        echo"m=$m d=$d";
        $sql3="update amammou.solde_fidelite set solde=solde+'$d'-'$m' where uname='$uname' ";
        try
        {
            $db->query($sql3);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function getSoldeF($un)
    {
        $sql="select * from amammou.solde_fidelite where uname='$un'";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql)->fetch();
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function addWish($un,$pId)
    {
        $sql="insert into amammou.wishlist (pId, uname) values ('$un','$pId')";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function getWish($em)
    {
        $sql="select * from amammou.wishlist where uname='$em'";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function deleteWish($pId,$em)
    {
        $sql="delete from amammou.wishlist where uname='$em' and pId='$pId'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function getProms($idprom=null)
    {
        if ($idprom!=null)
        {
            $sql="select * from amammou.promotion where id='$idprom'";
        }
        else
        {
            $sql="select * from amammou.promotion";
        }
        $db=config::getConnexion();
        try
        {
           return $db->query($sql)->fetchAll();
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function addProm($pId,$idprom)
    {
        $sql="update amammou.produit set en_prom=1,id_prom='$idprom' where reference='$pId'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function remProm($pId)
    {
        $sql="update amammou.produit set en_prom=0,id_prom=0 where reference='$pId'";
        $db=config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }
    function forgotPwd($em)
    {
        $sql="select * from amammou.users where u_email='$em'";
        $db=config::getConnexion();
        try
        {
            $res=$db->query($sql)->rowCount();
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
        if($res==1)
        {
            $x=random_int(100000,999999);
            $sql1="insert into amammou.pwd_confirm (email, code) VALUES ('$em','$x')";
            try
            {
                $db->query($sql1);
            }
            catch (Exception $e)
            {
                echo 'error :'.$e->getMessage();
            }
        }
        else
        {
            return "mathamech";
        }

    }
    function confirmPwd($code,$pwd)
    {
        $sql="select * from amammou.pwd_confirm where code='$code'";
        $db=config::getConnexion();
        try
        {
            $res=$db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
        if ($res->rowCount()<1)
        {
            echo '<body onLoad="alert(\'Wrong Confirmation Code...\')">';
            // puis on le redirige vers la page d'accueil
            echo '<meta http-equiv="refresh" content="0;URL=../confirm.php">';
            return 0;
        }
        else
        {
            foreach ($res as $re)
            {
                $em=$re["email"];
            }

            $p=md5($pwd);
            $sql2="update amammou.users set u_pwd='$p' where u_email='$em'";
            $sql3="delete from amammou.pwd_confirm where email='$em'";
            try
            {
                $db->query($sql2);
                $db->query($sql3);
                return "tbadel";
            }
            catch (Exception $e)
            {
                echo 'error :'.$e->getMessage();
            }
        }

    }
      function tri()
    {
      $sql="select * from amammou.orders order by OrderDate desc ";
      $db=config::getConnexion();
      try
      {
          return $db->query($sql);
      }
      catch (Exception $e)
      {
          echo 'error :'.$e->getMessage();
      }
    }
      function tri1()
      {
        $sql="select * from amammou.orders order by OrderDate asc ";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }
    }

    function search($nom)
    {
        $sq1="select * from amammou.orders where uname='$nom'" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sq1);
            return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }


    }
}

