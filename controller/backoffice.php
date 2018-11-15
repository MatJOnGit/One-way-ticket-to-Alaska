<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';

class Backoffice_Controller extends Controller
{
    public function createNewChapter()
    {
        $this->displayNavBar();
        require('view/backend/chapterAdding.php');
    }
    
    /**
    *
    * deleteAccount method tests if the user exists, delete the account if so, and displays
    * the user page once more.
    *
    **/
    public function deleteAccount()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\Model\UserManager();
        $userStatus = $userManager->getUserStatus($_GET['id']);
        if (isset($userStatus) && $userStatus[0] === 'member')
        {
            $deletedUser = $userManager->deleteAccount($_GET['id']);
        }
        header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
    }    
    
    public function deleteChapter()
    {
        $this->loadManagers();
        $chapterManager = new \project_Alaska\Model\ChapterManager();
        $deletedChapter = $chapterManager->deleteChapter($_GET['id']);
        
        if ($deletedChapter === true)
        {
            header('Location: index.php?action=getAdminPanel');
        }
    }
    
    public function demoteAdmin()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\Model\UserManager();
        $userStatus = $userManager->getUserStatus($_GET['id']);
        if (isset($userStatus) && $userStatus[0] === 'admin')
        {
            $userManager->demoteAdmin($_GET['id']);
        }
        header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
    }
    
    public function demoteOwner()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\Model\UserManager();
        $userStatus = $userManager->getUserStatus($_GET['id']);
        if (isset($userStatus) && $userStatus[0] === 'owner')
        {
            $userManager->demoteOwner($_GET['id']);
        }
        header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
    }
    
    public function displayAdmin404Page()
    {
        $this->displayNavBar();
        require 'view/backend/Admin404.php';
    }
    
    /**
    *
    * editChapterContent method tests if the chapter exists and displays the content
    * in chapterEditing page if so
    *
    **/
    public function editChapterContent()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $chapterManager = new \project_Alaska\Model\ChapterManager();
        $chapter = $chapterManager->getChapterContent($_GET['id']);
        if ($chapter != false)
        {
            require('view/backend/chapterEditing.php');
        }
        
        else
        {
            require 'view/backend/Admin404.php';
        }
    }
    
    public function getAdminPanel()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $userManager = new \project_Alaska\Model\UserManager();
        $chapterManager = new \project_Alaska\Model\ChapterManager();
        $commentManager = new \project_Alaska\Model\CommentManager();
        
        $userCount = $userManager->getUserCount();
        $chapterCount = $chapterManager->getChapterCount();
        $commentCount = $commentManager->getCommentsCount();
        $reportedCommentCount = $commentManager->getReportedCommentsCount();
        $chapters = $chapterManager->getChapters();

        require('view/backend/dashboard.php');
    }
    
    /**
    *
    * getNewChapterId method gets the highest chapter id in database, then redirect to
    * a createNewChapter page with the next id
    *
    **/
    public function getNewChapterId()
    {
        $this->loadManagers();
        $chapterManager = new \project_Alaska\Model\ChapterManager();
        $newChapterId = $chapterManager->getNewChapterId();
        
        if ($newChapterId[0] > 1)
        {
            header('Location: index.php?action=createNewChapter&id=' . $newChapterId[0]);
        }
        
        else
        {
            $newChapterId[0] = 1;
            header('Location: index.php?action=createNewChapter&id=' . $newChapterId[0]);
        }
    }
    
    public function hideComment()
    {
        $this->loadManagers();
        $commentManager = new \project_Alaska\Model\CommentManager();
        $commentManager->hideComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
    
    public function promoteAdmin()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\Model\UserManager();
        $userStatus = $userManager->getUserStatus($_GET['id']);
        if (isset($userStatus) && $userStatus[0] === 'admin')
        {
            $userManager->promoteAdmin($_GET['id']);
        }
        header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
    }
    
    public function promoteMember()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\Model\UserManager();
        $userStatus = $userManager->getUserStatus($_GET['id']);
        if (isset($userStatus) && $userStatus[0] === 'member')
        {
            $userManager->promoteMember($_GET['id']);
        }
        header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
    }
    
    public function searchMember()
    {
        $this->loadManagers();
        $userManager = new \project_Alaska\Model\UserManager();
        if (isset($_POST['username']) && (preg_match($this->usernameRegex, $_POST['username'])))
        {
            $userId = $userManager->getUserId($_POST['username']);
            if ($userId > 0)
            {
                header('Location: index.php?action=getMemberPanel&id=' . $userId);
            }

            else
            {
                header('Location: index.php?action=getAdminPanel');
            }
        }
        else
        {
            if (isset($_POST['username'])) { echo $_POST['username']; }
        }
    }
    
    public function unhideComment()
    {
        $this->loadManagers();
        $commentManager = new \project_Alaska\Model\CommentManager();
        $commentManager->unhideComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
    
    public function updateChapter($chapterId, $chapterContent, $chapterStatus)
    {
        $this->loadManagers();
        $chapterManager = new \project_Alaska\Model\ChapterManager();
        $updatedChapter = $chapterManager->updateChapter($chapterId, $chapterContent, $chapterStatus);
        
        if ($updatedChapter === true)
        {
            if ($chapterStatus === 'saved')
            {
                header('Location: index.php?action=editChapter&id=' . $chapterId);
            }
            
            elseif ($chapterStatus === 'published')
            {
                header('Location: index.php?action=getAdminPanel');
            }
        }
    }
    
    public function uploadNewChapter($chapterContent, $chapterStatus, $chapterTitle)
    {
        $this->loadManagers();
        $chapterManager = new \project_Alaska\Model\ChapterManager();
        $uploadedChapter = $chapterManager->uploadNewChapter($chapterContent, $chapterStatus, $chapterTitle);
        
        if ($uploadedChapter === true)
        {
            header('Location: index.php?action=getAdminPanel');
        }
    }
}