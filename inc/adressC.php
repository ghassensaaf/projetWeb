<?php

include 'config.php';
class adressC
{
    function showAdress($uname)
    {
        $sql="select * from amammou.adresses where u_uname like '$uname'";

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
}