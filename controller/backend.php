<?php

require_once 'interfaces/ControllerInterface.php';

class Backend_Controller implements iController
{
    public function loadManagers()
    {
        require_once('model/ChapterManager.php');
        require_once('model/CommentManager.php');
        require_once('model/UserManager.php');
    }

    public function getChapterslist()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        require('view/frontend/chaptersList.php');
    }

    public function getChapterContent()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\model\ChapterManager();
        $commentManager = new \owtta\model\CommentManager();

        $chapter = $chapterManager->getChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/chapterContent.php');
    }

    public function getAdminPanel()
    {
        $this->loadManagers();        
        require('view/backend/dashboard.php');
    }
    
    public function editChapterContent()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapter = $chapterManager->getChapter($_GET['id']);
        
        require('view/backend/chapterEditing.php');
    }
}