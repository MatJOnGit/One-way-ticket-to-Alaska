<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';

class Backend_Controller extends Controller
{
    public function createNewChapter()
    {
        $this->displayNavBar();
        require('view/backend/chapterAdding.php');
    }
    
    public function deleteAccount()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
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
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $deletedChapter = $chapterManager->deleteChapter($_GET['id']);
        
        if ($deletedChapter === true)
        {
            header('Location: index.php?action=getAdminPanel');
        }
    }
    
    public function demoteAdmin()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
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
        $userManager = new owtta\Blog\Model\UserManager();
        $userStatus = $userManager->getUserStatus($_GET['id']);
        if (isset($userStatus) && $userStatus[0] === 'owner')
        {
            $userManager->demoteOwner($_GET['id']);
        }
        header('Location: index.php?action=getMemberPanel&id=' . $_GET['id']);
    }
    
    public function editChapterContent()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapter = $chapterManager->getChapterContent($_GET['id']);
        require('view/backend/chapterEditing.php');
    }
    
    public function getAdminPanel()
    {
        $this->displayNavBar();
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $commentManager = new \owtta\Blog\Model\CommentManager();
        
        $userCount = $userManager->getUserCount();
        $chapterCount = $chapterManager->getChapterCount();
        $commentCount = $commentManager->getCommentsCount();
        $reportedCommentCount = $commentManager->getReportedCommentsCount();
        $chapters = $chapterManager->getChapters();

        require('view/backend/dashboard.php');
    }
        
    public function getNewChapterId()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
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
        $commentManager = new \owtta\Blog\Model\CommentManager();
        $commentManager->hideComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
    
    public function promoteAdmin()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
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
        $userManager = new owtta\Blog\Model\UserManager();
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
        $userManager = new owtta\Blog\Model\UserManager();
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
    
    public function unhideComment()
    {
        $this->loadManagers();
        $commentManager = new \owtta\Blog\Model\CommentManager();
        $commentManager->unhideComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
    
    public function updateChapter($chapterId, $chapterContent, $chapterStatus)
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
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
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $uploadedChapter = $chapterManager->uploadNewChapter($chapterContent, $chapterStatus, $chapterTitle);
        
        if ($uploadedChapter === true)
        {
            header('Location: index.php?action=getAdminPanel');
        }
    }
}