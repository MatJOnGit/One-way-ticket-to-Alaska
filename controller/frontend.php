<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';

class Frontend_Controller extends Controller
{
    public function getChapterslist()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        require('view/frontend/chaptersList.php');
    }

    public function getChapterContent()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $commentManager = new \owtta\Blog\Model\CommentManager();

        $chapter = $chapterManager->getChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/chapterContent.php');
    }

    public function register()
    {
        $this->loadManagers();
        require('view/frontend/register.php');
    }
    
    public function createAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $isPseudoExisting = $userManager->isPseudoExisting($_POST['user-name']);
        if (is_null($isPseudoExisting))
        {
            // "Non-existing pseudo in BDD" case
            $createdAccount = $userManager->createAccount($_POST['user-name'], $_POST['user-email'], $_POST['user-password']);
            if ($createdAccount === true)
            {
                $_SESSION['pseudo'] = $_POST['user-name'];
                $_SESSION['status'] = 'member';
                header('Location: index.php?action=getChaptersList');
            }
            elseif ($createdAccount === false)
            {
                header('Location: index.php?action=register');
            }
        }
        elseif ($isPseudoExisting > 0)
        {
            echo 'isPseudoExisting > 0';
            // "Existing pseudo in BDD" case
            header('Location: index.php?action=register');
        }
    }

    public function signIn()
    {
        $this->loadManagers();
        require('view/frontend/signIn.php');
    }
    
    public function logAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $statusMatching = $userManager->isIdCorrect($_POST['user-name'], $_POST['user-password']);
        if (is_string($statusMatching))
        {
            // Corresponding case between inputs in form and db
            $_SESSION['pseudo'] = $_POST['user-name'];
            $_SESSION['status'] = $statusMatching;
            header('Location: index.php?action=getChaptersList');
        }
        elseif (is_null($statusMatching))
        {
            header('Location: index.php?action=signIn');
        }
        else
        {
            header('Location: index.php');
        }
    }

    public function getMemberPanel()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_GET['id']);

        require('view/frontend/userInfo.php');
    }
    
    public function signOut()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
        session_destroy();
        header('Location: index.php');
    }
}