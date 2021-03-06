<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';
require_once 'services/DisplayableDataCheckingService.php';

class Frontoffice_Controller extends Controller
{
    public $emailRegex = '#^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$#';
    public $passwordRegex = '#^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,}$#';
    
    public function addComment()
    {
        $this->loadManagers();
        $commentManager = new \project_Alaska\model\CommentManager();
        $commentManager->addComment($_GET['id'], $_SESSION['pseudo'], trim($_POST['comment']));
        header('Location: index.php?action=getChapter&id=' . $_GET['id']);
    }
    
    /**
    *
    * createAccount method tests if data set on the register form are existing and valid,
    * then tests if the username is already used,
    * and finally create a new account with data in the register form if not.
    *
    **/
    public function createAccount()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\model\UserManager();
        if (isset($_POST['username']) &&
            (preg_match($this->usernameRegex, $_POST['username'])) &&
            (preg_match($this->emailRegex, $_POST['userEmail'])) &&
            (preg_match($this->passwordRegex, $_POST['userPassword'])) &&
            (preg_match($this->passwordRegex, $_POST['userCopiedPassword'])) &&
            ($_POST['userPassword'] === $_POST['userCopiedPassword']))
        {
            // Verify if the account already exists by returning an Id if so
            $userId = $userManager->getUserId($_POST['username']);
            
            if (is_null($userId))
            {
                // "Non-existing pseudo in BDD" case
                $newUserData = $userManager->createUser($_POST['username'], strtolower($_POST['userEmail']), password_hash($_POST['userPassword'], PASSWORD_DEFAULT));
                
                if (isset($newUserData) && $newUserData > 0)
                {
                    $_SESSION['pseudo'] = htmlspecialchars($_POST['username']);
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
        else
        {
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
        $commentManager = new \project_Alaska\model\CommentManager();
        
        if (isset($_POST['newComment']) && (!empty($_POST['newComment'])))
        {
            $editedCommentChapter = $commentManager->editComment($_GET['commentId'], htmlspecialchars($_POST['newComment']));
        }
        header('Location: index.php?action=getChapter&id=' . $_GET['id']);
    }
    
    public function editUserParam()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\model\UserManager();
        
        if ($_GET['updatedParam'] === 'username' || $_GET['updatedParam'] === 'userEmail' || $_GET['updatedParam'] === 'userPassword')
        {
            if ($_GET['updatedParam'] === 'username')
            {
                if (isset($_POST['newUsername']) && (preg_match($this->usernameRegex, $_POST['newUsername'])))
                {
                    $editedUserData = $userManager->editUserName($_POST['newUsername'], $_GET['id']);
                    $_SESSION['pseudo'] = htmlspecialchars(trim($_POST['newUsername']));
                    header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
                }
                
                else
                {
                    $this->display404Page();
                }
            }
            
            elseif ($_GET['updatedParam'] === 'userEmail')
            {
                if (isset($_POST['newUserEmail']) && (preg_match($this->emailRegex, $_POST['newUserEmail'])))
                {
                    $editedUserData = $userManager->editUserEmail($_POST['newUserEmail'], $_GET['id']);
                    header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
                }
                
                else
                    
                {
                    $this->display404Page();
                }
            }
            
            elseif ($_GET['updatedParam'] === 'userPassword')
            {
                if (isset($_POST['newUserPassword']) && (preg_match($this->passwordRegex, $_POST['newUserPassword'])))
                {
                    $editedUserData = $userManager->editUserPwd(password_hash($_POST['newUserPassword'], PASSWORD_DEFAULT), $_GET['id']);
                    header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
                }
                
                else
                {
                    $this->display404Page();
                }
            }
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
        $chapterManager = new \project_Alaska\model\ChapterManager();
        $commentManager = new \project_Alaska\model\CommentManager();
        
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
        $chapterManager = new \project_Alaska\model\ChapterManager();
        $chapterCount = $chapterManager->getChapterCount();
        $chapters = $chapterManager->getChapters();
        
        require('view/frontend/chaptersList.php');
    }
    
    public function getSpecificMemberPanel()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $userManager = new \project_Alaska\model\UserManager();
        $userInfo = $userManager->getUserInfo($_GET['id']);
        
        $displayableDataChecking = new \project_Alaska\Services\DisplayableDataCheckingService;
        $displayableDataChecking->testDisplayableData($_SESSION, $userInfo);
        
        require 'view/frontend/userInfo.php';
    }
    
    public function getUserMemberPanel()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $userManager = new \project_Alaska\model\UserManager();
        $userInfo = $userManager->getUserInfo($_SESSION['id']);
        
        $displayableDataChecking = new \project_Alaska\Services\DisplayableDataCheckingService;
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
        $userManager = new \project_Alaska\model\UserManager();
        
        if (isset($_POST['username']) &&
            (preg_match($this->usernameRegex, $_POST['username'])) &&
            (preg_match($this->passwordRegex, $_POST['userPassword'])))
        {
            $userData = $userManager->getUserPermissions($_POST['username'], $_POST['userPassword']);
            
            if (isset($userData[1])
                && password_verify($_POST['userPassword'], $userData[1])
                && $userData[0] > 0
                && is_string($userData[2]))
            {
                $_SESSION['pseudo'] = htmlspecialchars($_POST['username']);
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
        $commentManager = new \project_Alaska\model\CommentManager();
        $commentReporting = $commentManager->reportComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
    
    public function signIn()
    {
        $this->displayNavBar();
        require('./view/frontend/signin.php');
    }
    
    public function signOut()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\model\UserManager();
        session_destroy();
        header('Location: index.php');
    }
}