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
            listChapters();
        }
        elseif ($_GET['action'] == 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                post();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['author']) && !empty($_POST['comment']))
                {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else 
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'editComment') 
        {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) 
            {
                editComment($_GET['commentId'], $_GET['postId']);
            }
            else 
            {
                throw new Exception ('Identifiant du billet et/ou du commentaire manquant');
            }
        }
        elseif ($_GET['action'] == 'updateComment')
        {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0)
            {
                if (!empty($_POST['comment'])) 
                {
                    updateComment($_GET['commentId'], $_POST['comment']);
                    post();
                }
                else
                {
                    throw new Exception('Le formulaire n\'a pas été rempli');
                }
            }
            else
            {
                throw new Exception('Numéro de commentaire incorrect ou non renseigné');
            }
        }
    }
    else 
    {
        listPosts();
    }
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';