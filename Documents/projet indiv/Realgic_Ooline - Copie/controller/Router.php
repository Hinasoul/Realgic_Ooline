<?php

namespace RealgicOoline\controller;

use \Exception;
use \RealgicOoline\controller\Controller;

class Router
{

    private $controller;

    public function run()
    {
        $this->controller = new Controller();

        try
        {
            
//AFFICHAGE DES EVENEMENTS
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listEvents'){
                    $this->controller->listEvents();
                } 
//AFFICHAGE D UN SEUL EVENEMENT AVEC SES COMMENTAIRES
                elseif  ($_GET['action'] == 'clickEvents') {
                    if (isset($_GET['events']) && $_GET['events'] > 0) {
                        $this->controller->listComments($_GET['events']);
                    } else {
                        throw new Exception('Aucun identifiant d event envoyé');
                    }
                } 
//METTRE DES COMMENTAIRES
                elseif ($_GET['action'] == 'putComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['commentaire'])) {
                            $this->controller->addComment($_GET['id'], htmlspecialchars($_POST['commentaire']), $_SESSION['id_member']); //mettre <c a la place de num
                        } else {
                            throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                        }
                    }
                } 
//PUBLIER DES EVENEMENTS
                elseif ($_GET['action'] == 'putEvent') {
                    if (!empty($_POST['eventtitle']) && !empty($_POST['eventcontent']) && !empty($_POST['eventdate'])) {
                        var_dump($_FILES);
                        die;

                        $this->controller->addEvent(htmlspecialchars($_POST['eventtitle']),  htmlspecialchars($_POST['eventcontent']),  htmlspecialchars($_POST['eventdate']), htmlspecialchars($_FILES['fileName']), $_SESSION['id_member']); 
                    } else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                } 
//S INSCRIRE DANS LE SITE
                elseif ($_GET['action'] == 'goregister') {
                    require 'view\registration.php';
                } 
                elseif ($_GET['action'] == 'registration') {
                    if (!empty($_POST['prenom']) && !empty($_POST['motpasse']) && !empty($_POST['email'])) {
                        $this->controller->registerMember(htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['motpasse']), htmlspecialchars($_POST['email']) );
                    } else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
//SE CONNECTER DANS LE SITE
                elseif ($_GET['action'] == 'goconnect') {
                    require 'view\connection.php';
                } 
                elseif ($_GET['action'] == 'connection') {
                    if (!empty($_POST['formnickname']) && !empty($_POST['formmotpasse'])) {
                        $this->controller->controlMember( htmlspecialchars($_POST['formnickname']), htmlspecialchars($_POST['formmotpasse']));
                    }
                }
//SE DECONNECTER
                elseif ($_GET['action'] == 'godisconnect') {
                    session_unset();
                    $this->controller->listEvents();
                } 
//SUPRIMER DES EVENEMENTS
                elseif ($_GET['action'] == 'clickeraseEvent') {
                    $this->controller->deleteEvent($_GET['eraseEvent']);
                } 
//MODIFIER DES EVENEMENTS
                elseif ($_GET['action'] == 'goeditedEvent') {
                    if (isset($_GET['editEvent']) && $_GET['editEvent'] > 0) {
                        $this->controller->update1($_GET['editEvent']);
                    } else {
                        throw new Exception('Aucun identifiant d event envoyé');
                    }
                }
                elseif ($_GET['action'] == 'editedEvent') {
                    $this->controller->update2( htmlspecialchars($_POST['eventtitlechange']),  htmlspecialchars($_POST['eventcontentchange']),  htmlspecialchars($_POST['eventdatechange']),  $_GET['id']);
                }
//EFFACER COMMENTAIRES
                elseif ($_GET['action'] == 'clickeraseComment') {
                    if($_SESSION['id_member'] > 0){
                    $this->controller->deleteComment($_GET['eraseComment'], $_GET['idEvent']);
                    }
                }
              
            } else {
                $this->controller->listEvents();
            }
        } catch (Exeption $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
