<?php 

namespace RealgicOoline\model;

use \RealgicOoline\model\Manager;
use \PDO;

class EventManager extends Manager{

//RECUPERATION DES EVENEMENTS 
    public function getEvents() 
    {   
        $db = $this->dbConnect();
        $events = $db->query('SELECT id, id_member, title, event_date, content FROM event_creation LIMIT 5'); 
        return $events; 
 
    }   

//RECUPERATION D'UN SEUL EVENEMENT
    public function getEvent($eventId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT  id, id_member, title, event_date, content,  DATE_FORMAT(event_date, \'%d/%m/%Y à %Hh%imin%ss\') AS event_date FROM event_creation WHERE id = ?');
        $req->execute(array($eventId));
        $event = $req->fetch();

        return $event;
    }

//CREATION
    public function createEvent($title, $comment, $eventDate, $fileName, $member)
    {
        $db = $this->dbConnect();

        $insertIntoEventCreation = $db->prepare('INSERT INTO event_creation(title, content, event_date, event_image, id_member) VALUES(?,?,?,?)');
        $publishedEvent = $insertIntoEventCreation ->execute(array($title, $comment,$eventDate, $fileName, $member)); 
        
        return $publishedEvent;
    }
    
//SUPRESSION
    public function deleteEvent($erasedLineEventId)
    {
        $db = $this->dbConnect();

        $deleteFromEventCreation = $db->prepare('DELETE FROM event_creation WHERE id = ?');
        $deleteFromEventCreation->execute(array($erasedLineEventId));
                
        return $deleteFromEventCreation;
    }

//METTRE A JOUR
    public function updateEvent($title, $content, $eventDate, $id)
    {
        $db = $this->dbConnect();
        
        $editFromEventCreation = $db->prepare('UPDATE event_creation SET title= ? , content = ? , event_date = ? WHERE id= ?');
        $editFromEventCreation->execute(array($title, $content, $eventDate, $id));
                
        return $editFromEventCreation;
    }

} 