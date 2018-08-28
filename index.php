<?php

require 'view/frontend/header.php';

try
{
    if (!isset($_GET['action']))
    {
        require 'view/frontend/welcome.php';
    }
        else
    {
        require 'controller/frontend.php';
        
        $frontend_controller = new Frontend_Controller;
        
        if ($_GET['action'] == 'getChaptersList') 
        {
            require 'view/frontend/adminBar.php';
            $frontend_controller->getChaptersList();
        }
        elseif ($_GET['action'] == 'getChapter')
        {            
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                require 'view/frontend/adminBar.php';
                $frontend_controller->getChapterContent();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'register') 
        {
            require 'view/frontend/adminBar.php';
            $frontend_controller->register();
        }
        elseif ($_GET['action'] == 'signIn')
        {
            require 'view/frontend/adminBar.php';
            $frontend_controller->signIn();
        }
        elseif ($_GET['action'] == 'signOut')
        {
            require 'view/frontend/adminBar.php';
            $frontend_controller->signOut();
        }
        elseif ($_GET['action'] == 'getMemberPanel')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                require 'view/frontend/adminBar.php';
                $frontend_controller->getMemberPanel();
            }
            else
            {
                throw new Exception('Aucun membre enregistré reconnu');
            }
        }
        elseif ($_GET['action'] == 'getAdminPanel')
        {
            require 'controller/backend.php';
            $backend_controller = new Backend_Controller;
            $backend_controller->getAdminPanel();
        }
    }
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';