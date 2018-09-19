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
            if (isset($_SESSION['role']))
            {
                if ($_SESSION['role'] == 'admin')
                {
                    require 'view/frontend/adminBar.php';
                }
                elseif ($_SESSION['role'] == 'member')
                {
                    require 'view/frontend/memberBar.php';
                }
            }
            else
            {
                require 'view/frontend/logBar.php';
            }
            $frontend_controller->getChaptersList();
        }
        elseif ($_GET['action'] == 'getChapter')
        {            
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (isset($_SESSION['role']))
                {
                    if ($_SESSION['role'] == 'admin')
                    {
                        require 'view/frontend/adminBar.php';
                    }
                    elseif ($_SESSION['role'] == 'member')
                    {
                        require 'view/frontend/memberBar.php';
                    }
                }
                else
                {
                    require 'view/frontend/logBar.php';
                }
                $frontend_controller->getChapterContent();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        // Account creation access section
        elseif ($_GET['action'] == 'register')
        {
            if (isset($_SESSION['role']))
            {
                if ($_SESSION['role'] == 'admin')
                {
                    require 'view/frontend/adminBar.php';
                }
                elseif ($_SESSION['role'] == 'member')
                {
                    require 'view/frontend/memberBar.php';
                }
            }
            else
            {
                require 'view/frontend/logBar.php';
            }
            $frontend_controller->register();
        }
        elseif ($_GET['action'] === 'createAccount') {
            $frontend_controller->createAccount();
        }
        // Account loggin access section
        elseif ($_GET['action'] == 'signIn')
        {
            if (isset($_SESSION['role']))
            {
                if ($_SESSION['role'] == 'admin')
                {
                    require 'view/frontend/adminBar.php';
                }
                elseif ($_SESSION['role'] == 'member')
                {
                    require 'view/frontend/memberBar.php';
                }
            }
            else
            {
                require 'view/frontend/logBar.php';
            }
            $frontend_controller->signIn();
        }
        elseif ($_GET['action'] === 'logAccount')
        {
            $frontend_controller->logAccount();
        }
        // Account sign out access section
        elseif ($_GET['action'] == 'signOut')
        {
            require 'view/frontend/adminBar.php';
            $frontend_controller->signOut();
        }
        // Member space access section
        elseif ($_GET['action'] == 'getMemberPanel')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (isset($_SESSION['role']))
                {
                    if ($_SESSION['role'] == 'admin')
                    {
                        require 'view/frontend/adminBar.php';
                    }
                    elseif ($_SESSION['role'] == 'member')
                    {
                        require 'view/frontend/memberBar.php';
                    }
                }
                else
                {
                    require 'view/frontend/logBar.php';
                }
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
        elseif ($_GET['action'] == 'editChapter')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                require 'controller/backend.php';
                $backend_controller = new Backend_Controller;
                $backend_controller->editChapterContent();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'updateChapterContent')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['status']))
            {
                require 'controller/backend.php';
                $backend_controller = new Backend_Controller;

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
            require 'controller/backend.php';
            $backend_controller = new Backend_Controller;
            $backend_controller->addChapter();
        }
        elseif ($_GET['action'] === 'createNewChapter')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                require 'controller/backend.php';
                $backend_controller = new Backend_Controller;
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
                require 'controller/backend.php';
                $backend_controller = new Backend_Controller;
                
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
                require 'controller/backend.php';
                $backend_controller = new Backend_Controller;
                $backend_controller->deleteChapter($_GET['id']);
            }
            else
            {
                throw new Exception('Identifiant de chapitre incorrect');
            }
        }
    }
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}

require 'view/frontend/footer.php';