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
        require 'controller/frontoffice.php';
        $frontoffice_controller = new Frontoffice_Controller;
        
/**
*
* Frontoffice features available for all users
*
**/
        
        if ($_GET['action'] === 'getChaptersList')
        {
            $frontoffice_controller->getChaptersList();
        }
        
        elseif ($_GET['action'] === 'getChapter')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontoffice_controller->getChapterContent();
            }
            else
            {
                $frontoffice_controller->display404Page();
            }
        }
        
        elseif ($_GET['action'] === 'register')
        {
            $frontoffice_controller->register();
        }
        
        elseif ($_GET['action'] === 'createAccount')
        {
            $frontoffice_controller->createAccount();
        }

        elseif ($_GET['action'] === 'signIn')
        {
            $frontoffice_controller->signIn();
        }
        
        elseif ($_GET['action'] === 'logAccount')
        {
            $frontoffice_controller->logAccount();
        }
        
        elseif (!isset($_SESSION['status']))
        {
            $frontoffice_controller->display404Page();
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
                $frontoffice_controller->addComment();
            }
            else
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
            
        elseif ($_GET['action'] === 'signOut')
        {
            $frontoffice_controller->signOut();
        }

        elseif ($_GET['action'] === 'getMemberPanel')
        {
            if (!isset($_GET['id']))
            {
                $frontoffice_controller->getUserMemberPanel();
            }
            elseif (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontoffice_controller->getSpecificMemberPanel();
            }
            else
            {
                $frontoffice_controller->display404Page();
            }
        }

        elseif ($_GET['action'] === 'reportComment')
        {
            if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0 && isset($_GET['commentId']) && $_GET['commentId'] > 0)
            {
                $frontoffice_controller->reportComment();
            }
            else
            {
                throw new Exception('Il y a des paramètres manquants à l\'exécution de la fonctionnalité');
            }
        }
            
        elseif ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'member'))
        {
            $frontoffice_controller->display404Page();
        }
        
        elseif ($_GET['action'] === 'editMemberParam' && isset($_GET['updatedParam']))
        {
            $frontoffice_controller->editUserParam();
        }
        
        elseif ($_GET['action'] === 'editComment')
        {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontoffice_controller->editComment();
            }
            else
            {
                throw new Exception('Edition de commentaire impossible : erreur de paramètres');
            }
        }
        
        
        else
        {
            require 'controller/backoffice.php';
            $backoffice_controller = new Backoffice_Controller;
            
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
                        $backoffice_controller->hideComment();
                    }
                    else
                    {
                        $backoffice_controller->unhideComment();
                    }
                }
                else
                {
                    $frontoffice_controller->display404Page();
                }
            }
            
            elseif (($_GET['action'] === 'deleteMember'))
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backoffice_controller->deleteAccount();
                }
                else
                {
                    throw new Exception('Erreur d\'identifiant d\'utilisateur');
                }
            }
            
            elseif ($_GET['action'] === 'getAdminPanel')
            {
                $backoffice_controller->getAdminPanel();
            }
            
            elseif ($_GET['action'] === 'searchMember')
            {
                $backoffice_controller->searchMember();
            }
            
            elseif ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'admin'))
            {
                $backoffice_controller->displayAdmin404Page();
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
                    $backoffice_controller->editChapterContent();
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
                        $backoffice_controller->updateChapter($_GET['id'], $_POST['chapterContent'], $_GET['status']);
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
                $backoffice_controller->getNewChapterId();
            }

            elseif ($_GET['action'] === 'createNewChapter')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backoffice_controller->createNewChapter($_GET['id']);
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
                        $backoffice_controller->uploadNewChapter($_POST['chapterContent'], $_GET['status'], $_POST['chapterTitle']);
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
                    $backoffice_controller->deleteChapter();
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
                    $backoffice_controller->promoteMember();
                }
            }
            
            elseif ($_GET['action'] === 'demoteAdmin')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backoffice_controller->demoteAdmin();
                }
            }
            
            elseif ((isset($_SESSION['status'])) && ($_SESSION['status'] === 'owner'))
            {
                $backoffice_controller->displayAdmin404Page();
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
                    $backoffice_controller->promoteAdmin();
                }
            }
            
            elseif ($_GET['action'] === 'demoteOwner')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $backoffice_controller->demoteOwner();
                }
            }
            
            else
            {
                $backoffice_controller->displayAdmin404Page();
            }
        }
    }
}

catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';