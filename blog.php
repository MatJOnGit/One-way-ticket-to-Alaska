<?php

require 'controller/frontend.php';
require 'view/frontend/header.php';
require 'view/frontend/logbar.php';

try 
{
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'getChaptersList') 
        {
            getChaptersList();
        }
        elseif ($_GET['action'] == 'getChapter')
        {
            
            // fonction pour remonter le nombre de chapitres publiés pour remplacé le '0' de la ligne suivante ?
            
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
        elseif ($_GET['action'] == 'signin')
        {
            signin();
        }
    }
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';