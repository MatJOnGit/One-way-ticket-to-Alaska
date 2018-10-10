<?php

require 'view/frontend/header.php';

try
{
    
    if (!isset($_GET['action']))
    {
        require 'view/frontend/welcome.php';
    }
    
    elseif (isset($_GET['action']))
    {
        require 'controller/frontend.php';
        $frontend_controller = new Frontend_Controller;
        
/**
*
* Frontoffice features available for all users
*
**/
        
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
        
        elseif ($_GET['action'] === 'editMemberParam' && isset($_GET['updatedParam']))
        {
            $frontend_controller->editUserParam();
        }
        
        elseif (!isset($_SESSION['status']))
        {
            require 'view/frontend/404.php';
        }
        
/**
*
* Frontoffice features available for all members, admins, owners and superadmins
*
**/
        
        elseif ($_GET['action'] === 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontend_controller->addComment();
            }
            else
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
            
        elseif ($_GET['action'] === 'signOut')
        {
            $frontend_controller->signOut();
        }

        elseif ($_GET['action'] === 'getMemberPanel')
        {
            if (!isset($_GET['id']))
            {
                $frontend_controller->getUserMemberPanel();
            }
            elseif (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontend_controller->getSpecificMemberPanel();
            }
            else
            {
                require 'view/frontend/404.php';
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
            
        elseif ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'member'))
        {
            require 'view/frontend/404.php';
        }
        
        else
        {
            require 'controller/backend.php';
            $backend_controller = new Backend_Controller;
            
/**
*
* Backoffice features available for all admins, owners and superadmins
*
**/
            
            if ($_GET['action'] === 'editCommentStatus')
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
                else
                {
                    require 'view/frontend/404.php';
                }
            }
            
            elseif (($_GET['action'] === 'deleteMember'))
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backend_controller->deleteAccount();
                }
                else
                {
                    throw new Exception('Erreur d\'identifiant d\'utilisateur');
                }
            }
            
            elseif ($_GET['action'] === 'getAdminPanel')
            {
                $backend_controller->getAdminPanel();
            }
            
            elseif ($_GET['action'] === 'searchMember')
            {
                $backend_controller->searchMember();
            }
            
            elseif ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'admin'))
            {
                require 'view/backend/admin404.php';
            }
            
/**
*
* Backoffice features available for all owners and superadmins
*
**/
            
            elseif ($_GET['action'] === 'editChapter')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0 && $_SESSION['status'] != 'admin')
                {
                    $backend_controller->editChapterContent();
                }

                elseif ($_SESSION['status'] === 'admin')
                {
                    throw new Exception('Vous ne pouvez pas modifier ce contenu');
                }

                else 
                {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            
            elseif ($_GET['action'] === 'updateChapterContent')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['status']) && $_SESSION['status'] != 'admin')
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
                $backend_controller->getNewChapterId();
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
                    $backend_controller->deleteChapter();
                }
                else
                {
                    throw new Exception('Identifiant de chapitre incorrect');
                }
            }
            
            elseif ($_GET['action'] === 'promoteMember')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backend_controller->promoteMember();
                }
            }
            
            elseif ($_GET['action'] === 'demoteAdmin')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backend_controller->demoteAdmin();
                }
            }
            
            elseif ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'owner'))
            {
                require 'view/backend/admin404.php';
            }
            
/**
*
* Backoffice features available for superadmin only
*
**/
            
            elseif ($_GET['action'] === 'promoteAdmin')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backend_controller->promoteAdmin();
                }
            }
            
            elseif ($_GET['action'] === 'demoteOwner')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backend_controller->demoteOwner();
                }
            }
            
            else
            {
                require 'view/backend/admin404.php';
            }
        }
    }
}

catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';