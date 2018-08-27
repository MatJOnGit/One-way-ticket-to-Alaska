<?php

require 'controller/frontoffice_controller.php';

try
{
    if (!isset($_GET['action']))
    {
        require 'view/frontend/header.php';
        require 'view/frontend/welcome.php';
    }
        else
    {
        require 'view/frontend/header.php';
        require 'view/frontend/memberBar.php';
        
        $frontoffice_controller = new \owtta\controller\Frontoffice_controller();
        
        if ($_GET['action'] == 'getChaptersList') 
        {
            $frontoffice_controller->getChaptersList();
        }
        elseif ($_GET['action'] == 'getChapter')
        {            
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontoffice_controller->getChapterContent();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'register') 
        {
            $frontoffice_controller->register();
        }
        elseif ($_GET['action'] == 'signIn')
        {
            $frontoffice_controller->signIn();
        }
        elseif ($_GET['action'] == 'signOut')
        {
            $frontoffice_controller->signOut();
        }
        elseif ($_GET['action'] == 'getMemberPanel')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontoffice_controller->getMemberPanel();
            }
            else
            {
                throw new Exception('Aucun membre enregistré reconnu');
            }
        }
    }
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';