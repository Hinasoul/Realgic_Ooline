<?php

namespace RealgicOoline\model;

use \RealgicOoline\model\Manager;
use \PDO;


class CommentManager extends Manager{

//RECUPERATION DES COMMENTAIRES

    public function getComments($eventId)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, id_member, content, alert, like_comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM comment WHERE id_event= ?');
        $comments->execute(array($eventId));
        return $comments; 
    }

//CREATION
    public function createComment($eventId, $comment, $member)
    {
        $db = $this->dbConnect();

        $insertIntocomment = $db->prepare('INSERT INTO comment(id_event, content,  id_member, creation_date) VALUES(?,?,?, NOW())');
        $publishedComment= $insertIntocomment->execute(array($eventId, $comment, $member)); 

        return $publishedComment;
    }

//SUPRESSION 

    public function deleteComment($erasedLineCommentId)
    {
        $db = $this->dbConnect();

        $deleteFromComment= $db->prepare('DELETE FROM comment WHERE id = ?');
        $deleteFromComment->execute(array($erasedLineCommentId));
                
        return $deleteFromComment;
    }
    
//METTRE A JOUR 
    public function updateComment($content)
    {
        $db = $this->dbConnect();
        
        $editFromEventCreation = $db->prepare('UPDATE comment SET  content = ? WHERE id= ?');
        $editFromEventCreation->execute(array( $content));
                
        return $editFromEventCreation;
    }
}