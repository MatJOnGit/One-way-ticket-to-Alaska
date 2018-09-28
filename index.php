<?php

require 'view/frontend/header.php';

try
{
    
// Access & frontoffice features
    
    if (isset($_GET['action']))
    {
        // Init Frontoffice tools
        require 'controller/frontend.php';
        $frontend_controller = new Frontend_Controller;
        
        // Access
        if (isset($_SESSION['status']))
        {
            if ($_SESSION['status'] === 'admin')
            {
                require 'view/frontend/adminBar.php';
            }
            elseif ($_SESSION['status'] === 'member')
            {
                require 'view/frontend/memberBar.php';
            }
        }
        else
        {
            require 'view/frontend/logBar.php';
        }
        
        // Frontoffice features
        if ($_GET['action'] === 'getChaptersList')
        {
            $frontend_controller->getChaptersList();
        }
        
        elseif ($_GET['action'] === 'getChapter')
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
        
        elseif ($_GET['action'] === 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (isset($_SESSION['status']))
                {
                    $frontend_controller->addComment();
                }
            }
            else
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif ($_GET['action'] === 'register')
        {
            $frontend_controller->register();
        }
        
        elseif ($_GET['action'] === 'createAccount')
        {
            $frontend_controller->createAccount();
        }

        elseif ($_GET['action'] === 'signIn')
        {
            $frontend_controller->signIn();
        }
        
        elseif ($_GET['action'] === 'logAccount')
        {
            $frontend_controller->logAccount();
        }
        
        elseif ($_GET['action'] === 'signOut')
        {
            $frontend_controller->signOut();
        }
        
        elseif ($_GET['action'] === 'getMemberPanel')
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
        
        elseif ($_GET['action'] === 'reportComment')
        {
            if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0 && isset($_GET['commentId']) && $_GET['commentId'] > 0)
            {
                $frontend_controller->reportComment();
            }
            else
            {
                throw new Exception('Il y a des paramètres manquants à l\'exécution de la fonctionnalité');
            }
        }
        
        elseif (!isset($_SESSION['status']) || $_SESSION['status'] != 'admin')
        {
            require 'view/frontend/404.php';
        }
    }
    
    else
    {
        require 'view/frontend/welcome.php';
    }

// Backoffice access & features
    
    if (isset($_SESSION['status']) && $_SESSION['status'] === 'admin')
    {
        // Init backoffice tools
        require 'controller/backend.php';
        $backend_controller = new Backend_Controller;
        
        // Backoffice features
        if ($_GET['action'] === 'getAdminPanel')
        {
            $backend_controller->getAdminPanel();
        }
        
        elseif ($_GET['action'] === 'editChapter')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $backend_controller->editChapterContent();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif ($_GET['action'] === 'updateChapterContent')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['status']))
            {
                if (($_GET['status'] === 'saved') || ($_GET['status'] === 'published'))
                {
                    $backend_controller->updateChapter($_GET['id'], $_POST['chapterContent'], $_GET['status']);
                }
                else
                {
                    throw new Exception('L\'action demandée sur le chapitre ' . $_GET['id'] . 'n\'est pas possible');
                }
            }
            else
            {
                throw new Exception('Numéro de commentaire incorrect ou non renseigné');
            }
        }
        
        elseif ($_GET['action'] === 'addChapter')
        {
            $backend_controller->addChapter();
        }
        elseif ($_GET['action'] === 'createNewChapter')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $backend_controller->createNewChapter($_GET['id']);
            }
            else
            {
                throw new Exception('Identifiant de chapitre incorrect');
            }
        }
        
        elseif ($_GET['action'] === 'uploadNewChapterContent')
        {
            if (isset($_GET['status']))
            {
                if (($_GET['status'] === 'saved') || ($_GET['status'] === 'published'))
                {
                    $backend_controller->uploadNewChapter($_POST['chapterContent'], $_GET['status'], $_POST['chapterTitle']);
                }
                else
                {
                    throw new Exception('L\'action demandée sur le chapitre ' . $_GET['id'] . 'n\'est pas possible');
                }
            }
        }
        
        elseif ($_GET['action'] === 'deleteChapter')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $backend_controller->deleteChapter($_GET['id']);
            }
            else
            {
                throw new Exception('Identifiant de chapitre incorrect');
            }
        }
        
        elseif ($_GET['action'] === 'editCommentStatus')
        {
            if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0 && isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['newStatus']) && (($_GET['newStatus'] === 'hidden') || ($_GET['newStatus'] === 'unhidden')))
            {
                if ($_GET['newStatus'] === 'hidden')
                {
                    $backend_controller->hideComment();
                }
                else
                {
                    $backend_controller->unhideComment();
                }
            }
            elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['newStatus']))
            {
                throw new Exception('Nouveau status non reconnu');
            }
            else
            {
                throw new Exception('Erreur d\'identifiant de billet envoyé');
            }
        }
    }
}

catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';