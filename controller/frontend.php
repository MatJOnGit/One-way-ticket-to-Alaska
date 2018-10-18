<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';
require_once 'services/DisplayableDataCheckingService.php';

class Frontend_Controller extends Controller
{
    public function addComment()
    {
        $this->loadManagers();
        $commentManager = new owtta\Blog\Model\CommentManager();
        $commentManager->addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
        header('Location: index.php?action=getChapter&id=' . $_GET['id']);
    }
    
    /**
    *
    * createAccount method tests if the username is already used, and create a new account with
    * data in the register form if it is not.
    *
    **/
    public function createAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userId = $userManager->getUserId($_POST['user-name']);
        if (is_null($userId))
        {
            // "Non-existing pseudo in BDD" case
            $newUserData = $userManager->createUser($_POST['user-name'], $_POST['user-email'], password_hash($_POST['user-password'], PASSWORD_DEFAULT));
            
            if (isset($newUserData) && $newUserData > 0)    
            {
                echo 'compte créé';
                $_SESSION['pseudo'] = htmlspecialchars($_POST['user-name']);
                $_SESSION['id'] = $newUserData;
                $_SESSION['status'] = 'member';
                header('Location: index.php?action=getChaptersList');
            }
            else
            {
                header('Location: index.php?action=register');
            }
        }
        elseif ($userId > 0)
        {
            // "Existing pseudo in BDD" case
            header('Location: index.php?action=register');
        }
    }
    
    public function display404Page()
    {
        $this->displayNavBar();
        require 'view/frontend/404.php';
    }
    
    public function editComment()
    {
        $this->loadManagers();
        $commentManager = new owtta\Blog\Model\CommentManager();
        
        if (isset($_POST['newComment']) && (!empty($_POST['newComment'])))
        {
            $editedCommentChapter = $commentManager->editComment($_GET['commentId'], htmlspecialchars($_POST['newComment']));
        }
        header('Location: index.php?action=getChapter&id=' . $_GET['id']);
    }
    
    public function editUserParam()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();

        if ($_GET['updatedParam'] === 'userName' || $_GET['updatedParam'] === 'userEmail' || $_GET['updatedParam'] === 'userPwd')
        {
            if ($_GET['updatedParam'] === 'userName')
            {
                $editedUserData = $userManager->editUserName($_POST['newUserName'], $_GET['id']);
                $_SESSION['pseudo'] = htmlspecialchars($_POST['newUserName']);
            }
            elseif ($_GET['updatedParam'] === 'userEmail')
            {
                if (isset($_POST['newUserEmail']) && (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['newUserEmail'])))
                {
                    $editedUserData = $userManager->editUserEmail($_POST['newUserEmail'], $_GET['id']);
                }
                else
                {
                    $this->display404Page();
                }
                
            }
            elseif ($_GET['updatedParam'] === 'userPwd')
            {
                $editedUserData = $userManager->editUserPwd(password_hash($_POST['newUserPwd'], PASSWORD_DEFAULT), $_GET['id']);
            }
            
            header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
        }
        else
        {
            require 'view/frontend/404.php';
        }
    }
    
    /**
    *
    * getChapterContent method tests if the chapter exists, and only display it if
    * it has a published status or if the user is owner or superadmin.
    *
    **/
    public function getChapterContent()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $commentManager = new \owtta\Blog\Model\CommentManager();

        $chapter = $chapterManager->getChapterContent($_GET['id']);
        
        if ($chapter != false && ($chapter['status'] === 'published' || (isset($_SESSION['status']) && ($_SESSION['status'] === 'owner' || $_SESSION['status'] === 'superadmin'))))
        {
            $commentsCount = $commentManager->getCommentsCountByChapter($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            require('view/frontend/chapterContent.php');            
        }
        else
        {
            require 'view/frontend/404.php';
        }
    }
    
    public function getChapterslist()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        require('view/frontend/chaptersList.php');
    }
    
    public function getSpecificMemberPanel()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_GET['id']);
        
        $displayableDataChecking = new \owtta\Blog\Service\DisplayableDataCheckingService;
        $displayableDataChecking->testDisplayableData($_SESSION, $userInfo);
        
        require 'view/frontend/userInfo.php';
    }
    
    public function getUserMemberPanel()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_SESSION['id']);
        
        $displayableDataChecking = new \owtta\Blog\Service\DisplayableDataCheckingService;
        $displayableDataChecking->testDisplayableData($_SESSION, $userInfo);
        
        require 'view/frontend/userInfo.php';
    }
    
    /**
    *
    * logAccount method tests if the username and password set on the signin form are valid,
    * then gets user data from db and compare them to form data,
    * and finally sets session data values if so.
    *
    **/
    public function logAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        if ((preg_match('#^(?=.{5,20}$)[a-zA-Z]+([_-]?[a-zA-Z0-9])*$#', $_POST['user-name']))
            && (preg_match('#^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,}$#', $_POST['user-password'])))
        {
            $userData = $userManager->getUserPermissions($_POST['user-name'], $_POST['user-password']);
            
            if (isset($userData[1])
                && password_verify($_POST['user-password'], $userData[1])
                && $userData[0] > 0
                && is_string($userData[2]))
            {
                $_SESSION['pseudo'] = htmlspecialchars($_POST['user-name']);
                $_SESSION['id'] = $userData[0];
                $_SESSION['status'] = $userData[2];
                header('Location: index.php?action=getChaptersList');
            }            
            else
            {
                header('Location: index.php?action=signIn');
            }
        }
        else
        {
            header('Location: index.php?action=signIn');
        }
    }
    
    public function register()
    {
        $this->displayNavBar();
        $this->loadManagers();
        require('view/frontend/register.php');
    }
    
    public function reportComment()
    {
        $this->loadManagers();
        $commentManager = new owtta\Blog\Model\CommentManager();
        $commentReporting = $commentManager->reportComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
    
    public function signIn()
    {
        $this->displayNavBar();
        require('view/frontend/signIn.php');
    }
    
    public function signOut()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
        session_destroy();
        header('Location: index.php');
    }
}