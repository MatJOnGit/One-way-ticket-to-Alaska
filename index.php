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
        if ($_GET['action'] == 'getChaptersList') 
        {
            getChaptersList();
        }
        elseif ($_GET['action'] == 'getChapter')
        {            
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                getChapterContent();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'register') 
        {
            register();
        }
        elseif ($_GET['action'] == 'signIn')
        {
            signIn();
        }
        elseif ($_GET['action'] == 'signOut')
        {
            signOut();
        }
        elseif ($_GET['action'] == 'getMemberPanel')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                getMemberPanel();
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