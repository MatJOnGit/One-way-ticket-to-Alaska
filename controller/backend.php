<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';

class Backend_Controller extends Controller
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

    public function getAdminPanel()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $commentManager = new \owtta\Blog\Model\CommentManager();
        
        $userCount = $userManager->getUserCount();
        $chapterCount = $chapterManager->getChapterCount();
        $commentCount = $commentManager->getCommentCount();
        $chapters = $chapterManager->getChapters();
        $reportedCommentCount = $commentManager->getReportedCommentCount();

        require('view/backend/dashboard.php');
    }
    
    public function editChapterContent()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapter = $chapterManager->getChapter($_GET['id']);
        
        require('view/backend/chapterEditing.php');
    }
    
    public function updateChapter($chapterId, $chapterContent, $chapterStatus)
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $updatedChapter = $chapterManager->updateChapter($chapterId, $chapterContent, $chapterStatus);
        
        if ($updatedChapter === true)
        {
            header('Location: index.php?action=editChapter&id=' . $chapterId);
        }
    }
    
    public function addChapter()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $newChapterId = $chapterManager->getNewChapterId();
        
        if ($newChapterId[0] >= 1)
        {
            header('Location: index.php?action=createNewChapter&id=' . $newChapterId[0]);
        }
    }
    
    public function createNewChapter()
    {
        require('view/backend/chapterAdding.php');
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
    
    public function deleteChapter($chapterId)
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $deletedChapter = $chapterManager->deleteChapter($chapterId);
        
        if ($deletedChapter === true)
        {
            header('Location: index.php?action=getAdminPanel');
        }
    }
}