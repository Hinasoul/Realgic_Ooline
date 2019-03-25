<?php

namespace RealgicOoline\controller;

use \Exception;
use \RealgicOoline\model\CommentManager;
use \RealgicOoline\model\EventManager;
use \RealgicOoline\model\MemberManager;

class Controller
{

    private $eventManager;
    private $commentManager;

    public function __construct()
    {
        $this->eventManager = new EventManager();
        $this->commentManager = new CommentManager();
        $this->memberManager = new MemberManager();
    }

//pour les evenements
    public function listEvents()
    {
        $events = $this->eventManager->getEvents();
        require 'view/listEvents.php';
    }

//affichage des commentaires avec evenements
    public function listComments($eventId)
    {
        if (isset($eventId) && ($eventId > 0)) {
            $event = $this->eventManager->getEvent($eventId);
            $comments = $this->commentManager->getComments($eventId);
            require 'view/listEventsComments.php';
        }
    }

//Ajouter des commentaires
    public function addComment($eventId, $comment, $member)
    {
        $publishedComments = $this->commentManager->createComment($eventId, $comment, $member);

        if ($publishedComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=clickEvents&events=' . $eventId);
        }
    }

//Ajouter Evenements
    public function addEvent($title, $comment, $eventDate, $fileName, $member) //$member session
    {

        $publishedEvent = $this->eventManager->createEvent($title, $comment, $eventDate, $fileName, $member);

        if ($publishedEvent == false) {
            throw new Exception('Impossible d\'ajouter l\'evenement !');
        } else {
            header('Location: index.php');
        }
    }

    public function registerMember($nickname, $nicknamePassword, $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
            $nicknamePasswordHash = password_hash($nicknamePassword, PASSWORD_DEFAULT);

            $newMember = $this->memberManager->putMember($nickname, $nicknamePasswordHash, $email);

            header('Location: index.php');
        } else {
            echo("Mauvais format de email");
        }
    }

    //Connecter membre

    public function controlMember($pseudo, $password) // formnickname,  formmotpasse (post)
    {
        $pseudoverif = htmlspecialchars($pseudo); //formnickname
        $passwordverif = htmlspecialchars($password); //formmotpasse
        $verifMember = $this->memberManager->verifMember($pseudoverif); //db name
        
        if ($verifMember == false) {
            throw new Exception("erreur d'authentification 1");
        } else {
            if (password_verify($passwordverif, $verifMember['nickname_password'])) { //verif co tient tout la base
                $_SESSION['nickname'] = $verifMember['nickname'];
                $_SESSION['id_member'] = $verifMember['id'];
                header('Location: index.php');
            } else {
                throw new Exception("erreur d'authentification 2");
            }
        }
    }

//suprimer event
    public function deleteEvent($erasedLineEventId)
    {
        $delitedEvent = $this->eventManager->deleteEvent($erasedLineEventId);

        if ($delitedEvent == false) {
            throw new Exception('Impossible de suprimer l\'evenement !');
        } else {
            header('Location: index.php');
        }
    }

    public function updateEvent($title, $content, $id)
    {
        $updatedEvent = $this->eventManager->updateEvent($title, $content, $id);

        if ($updatedEvent == false) {
            throw new Exception('Impossible de suprimer l\'evenement !');
        } else {
            require 'view/eventEdition.php';
        }
    }

    public function deleteComment($erasedLineCommentId, $idEvent)
    {
        $delitedComment = $this->commentManager->deleteComment($erasedLineCommentId);

        if ($delitedComment == false) {
            throw new Exception('Impossible de suprimer l\'evenement !');
        } else {
            header('Location: index.php?action=clickEvents&events=' . $idEvent);
        }
    }

    public function update1($eventId)
    {
        if (isset($eventId) && ($eventId > 0)) {
            $event = $this->eventManager->getEvent($eventId);
            require 'view/eventEdition.php';
        }
    }

    public function update2($title, $content, $eventDate, $id)
    {
        $updatedEvent = $this->eventManager->updateEvent($title, $content, $eventDate, $id);

        if ($updatedEvent == false) {
            throw new Exception('Impossible de suprimer l\'evenement !');
        } else {
            header('Location: index.php');
        }
    }
}