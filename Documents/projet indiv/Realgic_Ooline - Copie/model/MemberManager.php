<?php 

namespace RealgicOoline\model;

use \RealgicOoline\model\Manager;
use \PDO;


class MemberManager extends Manager{

//INSCRIPTION 
   public function putMember($nickname, $nicknamePassword, $email) 
   {  
       $db = $this->dbConnect();

       $insertIntoMember = $db->prepare('INSERT INTO member(nickname, nickname_password, email) VALUES(?,?,?)');
       $newMember = $insertIntoMember ->execute(array($nickname, $nicknamePassword, $email)); 
       
        return  $newMember;
    }

//CONNEXION  
    public function verifMember($pseudo) 
    {   
        $db = $this->dbConnect();

        $verifUser= $db->prepare('SELECT id, nickname, nickname_password, id_role FROM member WHERE nickname = ?');
        $verifUser->execute(array($pseudo)); 
         
        $member=$verifUser->fetch();
        $verifUser->closeCursor();

        return  $member;
     }
}   
