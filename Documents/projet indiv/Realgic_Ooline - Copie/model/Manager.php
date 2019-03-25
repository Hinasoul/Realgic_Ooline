<?php 

namespace RealgicOoline\model;

use \RealgicOoline\model\Manager;
use \PDO;


class Manager{
//CONNEXION A LA BASE DE DONNEES
    protected function dbConnect() 
    {   
    
        $db = new PDO('mysql:host=localhost;dbname=realgic_ooline;charset=utf8', 'root', '');
        return $db;

    }   
}