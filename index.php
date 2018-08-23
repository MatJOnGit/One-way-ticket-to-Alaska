<?php

try
{
    if (!isset($_GET['action']))
    {
        require 'view/frontend/header.php';
        require 'view/frontend/welcome.php';
        require 'view/frontend/footer.php';
    }
        else
    {
        require 'controller/frontend.php';
        require 'view/frontend/header.php';
        require 'view/frontend/memberBar.php';
        
        $frontend_controller = new Frontend_Controller;
        
        if ($_GET['action'] == 'getChaptersList') 
        {
            $frontend_controller->getChaptersList();
        }
        elseif ($_GET['action'] == 'getChapter')
        {            
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontend_controller->getChapterContent();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'register') 
        {
            $frontend_controller->register();
        }
        elseif ($_GET['action'] == 'signIn')
        {
            $frontend_controller->signIn();
        }
        elseif ($_GET['action'] == 'signOut')
        {
            $frontend_controller->signOut();
        }
        elseif ($_GET['action'] == 'getMemberPanel')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontend_controller->getMemberPanel();
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